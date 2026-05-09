<?php

namespace App\Controllers;

use App\Models\Cliente_Model;
use App\Models\DoadorModel; 
use App\Models\EnderecoModel;


class Cliente extends BaseController
{
    public function login()
    {
        return view('cliente/login');
    }

    public function autenticar()
    {
        // remove sessão antiga
        session()->remove(['id', 'nome', 'logado']);

        $model = new Cliente_Model();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $cliente = $model->where('email', $email)->first();

        if ($cliente && $cliente['senha'] === $senha) {

            session()->set([
                'id'      => $cliente['id'],
                'nome'    => $cliente['nome'],
                'logado'  => true
            ]);

            return redirect()->to('/cliente');
        }

        return redirect()->back()->with('erro', 'Email ou senha inválidos');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/cliente/login');
    }

    public function index()
    {
        $this->verificarLogin();

        // 🔥 limpa automaticamente

        return view('cliente/index');
    }

    public function cadastrar()
    {

        return view('cliente/cadastrar');
    }

    private function verificarLogin()
    {
        if (!session()->get('logado')) {
            header('Location: ' . base_url('cliente/login'));
            exit;
        }
    }

    


public function catalogo()
{
    $db = \Config\Database::connect();

    $query = $db->query("
        SELECT roupas.*, doador.nome as nome_doador
        FROM roupas
        JOIN doador ON doador.id = roupas.idDoador
    ");

    $dados['roupas'] = $query->getResultArray();

    return view('cliente/catalogo', $dados);
}

public function detalhes($id)
{
    $db = \Config\Database::connect();

    $query = $db->query("
        SELECT roupas.*, 
       doador.nome as nome_doador, 
       doador.celular, 
       doador.email
        FROM roupas
        JOIN doador ON doador.id = roupas.idDoador
        WHERE roupas.id = ?
    ", [$id]);

    $dados['roupa'] = $query->getRowArray();

    return view('cliente/detalhes', $dados);
}

public function interesse($idRoupa)
{
    $db = \Config\Database::connect();

    // evita duplicado
    $existe = $db->table('interesse')
        ->where('idRoupa', $idRoupa)
        ->where('idCliente', session()->get('id'))
        ->get()
        ->getRow();

    if (!$existe) {
        $db->table('interesse')->insert([
            'idRoupa'   => $idRoupa,
            'idCliente' => session()->get('id')
        ]);
    }

    return redirect()->back()->with('sucesso', 'Interesse registrado!');
}

public function salvar()
    {
        $clienteModel = new Cliente_Model();

        $celular = preg_replace('/\D/', '', $this->request->getPost('celular'));

    if (strlen($celular) != 11) {
        return redirect()->back()->with('erro', 'Número inválido');
    }

    $email = $this->request->getPost('email');

    // verificar duplicidade
    if ($clienteModel->where('email', $email)->first()) {
        return redirect()->back()->with('erro', 'Email já cadastrado');
    }

    if ($clienteModel->where('celular', $celular)->first()) {
        return redirect()->back()->with('erro', 'Celular já cadastrado');
    }

    $codigo = rand(100000, 999999);

    $clienteId = $clienteModel->insert([
        'nome' => $this->request->getPost('nome'),
        'email' => $email,
        'celular' => $celular,
        'data_nas' => $this->request->getPost('data_nas'),
        'senha' => $this->request->getPost('senha'),
        'codigo_verificacao' => $codigo,
        'verificado' => 0
    ]);

    return redirect()->to('/cliente/verificar/'.$clienteId);
    }

    public function verificar($id)
{
    $model = new Cliente_Model();
    $cliente = $model->find($id);

    return view('cliente/verificar', [
    'id' => $id,
    'codigo' => $cliente['codigo_verificacao'],
    'celular' => $cliente['celular']
]);
}
    
}