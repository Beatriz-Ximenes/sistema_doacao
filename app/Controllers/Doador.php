<?php

namespace App\Controllers;

use App\Models\DoadorModel;
use App\Models\EnderecoModel;
use App\Models\RoupaModel;


class Doador extends BaseController
{
    public function index()
    {
        $this->verificarLogin();
            $this->limparDoacoes(); // 🔥 aqui também

        return view('doador/index');
    }

    public function login()
{
    return view('doador/login');
}

public function roupas()
{

    $this->limparDoacoes(); // 🔥 aqui também

    $model = new \App\Models\RoupaModel();

    $dados['roupas'] = $model
        ->where('idDoador', session()->get('id'))
        ->findAll();

    return view('doador/roupa/index', $dados);
}

public function excluirRoupa($id)
{
    $model = new RoupaModel();

    // segurança: só pode excluir se for dele
    $model->where('id', $id)
          ->where('idDoador', session()->get('id'))
          ->delete();

    return redirect()->to('/doador/roupa');
}


public function autenticar()
{
    $model = new \App\Models\DoadorModel();

    $email = $this->request->getPost('email');
    $senha = $this->request->getPost('senha');

    $doador = $model->where('email', $email)->first();

    if ($doador && $doador['senha'] === $senha) {

        // 🔥 BLOQUEIO AQUI
        if ($doador['verificado'] != 1) {
            return redirect()->back()->with('erro', 'Verifique seu número primeiro');
        }
        $model->update($doador['id'], [
            'ultimo_acesso' => date('Y-m-d H:i:s')
        ]);

        session()->set([
            'id'     => $doador['id'],
            'nome'   => $doador['nome'],
            'tipo'   => 'doador',
            'logado' => true
        ]);

        return redirect()->to('/doador');
    }

    return redirect()->back()->with('erro', 'Email ou senha inválidos');
}

public function logout()
{
    session()->destroy();
    return redirect()->to('/doador/login');
}

    public function cadastrar()
    {
        return view('doador/cadastrar');
    }

public function salvar()
{
    $doadorModel = new DoadorModel();
    $enderecoModel = new EnderecoModel();

    // 🔥 VALIDAÇÃO AQUI
    $celular = preg_replace('/\D/', '', $this->request->getPost('celular'));

    if (strlen($celular) != 11) {
        return redirect()->back()->with('erro', 'Número inválido');
    }


        // 🔍 limpar celular
    $celular = preg_replace('/\D/', '', $this->request->getPost('celular'));

    // 🔍 validar tamanho
    if (strlen($celular) != 11) {
        return redirect()->back()->with('erro', 'Número inválido');
    }

    $email = $this->request->getPost('email');

    // 🔥 VERIFICAR EMAIL
    $existeEmail = $doadorModel->where('email', $email)->first();

    if ($existeEmail) {
        return redirect()->back()->with('erro', 'Email já cadastrado');
    }

    // 🔥 VERIFICAR CELULAR
    $existeCelular = $doadorModel->where('celular', $celular)->first();

    if ($existeCelular) {
        return redirect()->back()->with('erro', 'Celular já cadastrado');
    }
    
    $codigo = rand(100000, 999999);


    $doadorId = $doadorModel->insert([
        'nome'      => $this->request->getPost('nome'),
        'email'     => $this->request->getPost('email'),
        'celular'   => $celular, // 🔥 usa o tratado
        'data_nas'  => $this->request->getPost('data_nas'),
        'senha'     => $this->request->getPost('senha'),
        'codigo_verificacao' => $codigo,
        'ultimo_acesso' => date('Y-m-d H:i:s')
    ]);

    return redirect()->to('/doador/verificar/'.$doadorId);

}


    private function verificarLogin()
    {
        if (!session()->get('logado')) {
            exit(redirect()->to('/doador/login'));
        }
    }

    public function cadastrarRoupa()
    {
        $this->verificarLogin();
        return view('doador/roupa/cadastrar');
    }

    public function salvarRoupa()
{
    $model = new \App\Models\RoupaModel();

    $file = $this->request->getFile('imagem');

    $nomeImagem = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $nomeImagem = $file->getRandomName();

        $file->move(ROOTPATH . 'public/uploads', $nomeImagem);
    }
    $model->insert([
        'tipo'          => $this->request->getPost('tipo'),
        'cor'           => $this->request->getPost('cor'),
        'quantidade'    => $this->request->getPost('quantidade'),
        'bairro'        => $this->request->getPost('bairro'),
        'ponto_doacao'  => $this->request->getPost('ponto_doacao'),
        'idDoador'      => session()->get('id'),
        'imagem'        => $nomeImagem,
        'criado_em'     => date('Y-m-d H:i:s') // 🔥 AQUI

    ]);

    return redirect()->to('/doador/roupa');
}

public function verificar($id)
{
    $model = new DoadorModel();
    $doador = $model->find($id);

    return view('doador/verificar', [
    'id' => $id,
    'codigo' => $doador['codigo_verificacao'],
    'celular' => $doador['celular']
]);
}

public function confirmar()
{
    $model = new \App\Models\DoadorModel();

    $id = $this->request->getPost('id');
    $codigo = $this->request->getPost('codigo');

    $doador = $model->find($id);

    if ($doador && $doador['codigo_verificacao'] == $codigo) {

        // 🔥 atualiza aqui
        $model->update($id, [
            'verificado' => 1,
            'codigo_verificacao' => null
        ]);

        // 🔥 login automático
        session()->set([
            'id'     => $doador['id'],
            'nome'   => $doador['nome'],
            'tipo'   => 'doador',
            'logado' => true
        ]);

        return redirect()->to('/doador');
    }

    return redirect()->back()->with('erro', 'Código incorreto');
}

public function reenviarCodigo()
{
    $model = new \App\Models\DoadorModel();

    // antes de gerar novo código
    $tempo = session()->get('tempo_codigo');

    if ($tempo && (time() - $tempo < 30)) {
        return redirect()->back()->with('erro', 'Aguarde 30 segundos');
    }

    session()->set('tempo_codigo', time());

    $id = $this->request->getPost('id');

    $novoCodigo = rand(100000, 999999);

    $model->update($id, [
        'codigo_verificacao' => $novoCodigo
    ]);

    return redirect()->to('/doador/verificar/'.$id)
                     ->with('sucesso', 'Novo código gerado!');
}

public function marcarDoado($id)
{
    $model = new RoupaModel();

    $model->update($id, [
        'status' => 'doado',
        'data_doado' => date('Y-m-d H:i:s')
    ]);

    return redirect()->back()->with('sucesso', 'Marcado como doado!');
}

public function limparDoacoes()
{
    $model = new RoupaModel();

    $roupas = $model
        ->where('status', 'doado')
        ->where('data_doado <=', date('Y-m-d H:i:s', strtotime('-7 days')))
        ->findAll();

    foreach ($roupas as $r) {

        // apagar imagem
        if ($r['imagem'] && file_exists(FCPATH.'uploads/'.$r['imagem'])) {
            unlink(FCPATH.'uploads/'.$r['imagem']);
        }

        // apagar do banco
        $model->delete($r['id']);
    }
}

}