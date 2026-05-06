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
        return view('doador/dashboard');
    }

    public function cadastrar()
    {
        return view('doador/cadastrar');
    }

    public function salvar()
    {
        $doadorModel = new DoadorModel();
        $enderecoModel = new EnderecoModel();

        $doadorId = $doadorModel->insert([
            'nome'      => $this->request->getPost('nome'),
            'email'     => $this->request->getPost('email'),
            'celular'   => $this->request->getPost('celular'),
            'data_nas'  => $this->request->getPost('data_nas'),
        ]);

        $enderecoModel->insert([
            'idReferencia' => $doadorId,
            'tipo'         => 'doador',
            'rua'          => $this->request->getPost('rua'),
            'complemento'  => $this->request->getPost('complemento'),
            'bairro'       => $this->request->getPost('bairro'),
            'municipio'    => $this->request->getPost('municipio'),
            'estado'       => $this->request->getPost('estado'),
            'local_doacao' => $this->request->getPost('local_doacao'),
        ]);

        return redirect()->to('/doador');
    }

    private function verificarLogin()
    {
        if (!session()->get('logado')) {
            return redirect()->to('/cliente/login');
        }
    }

    public function cadastrarRoupa()
    {
        $this->verificarLogin();
        return view('doador/roupas/cadastrar');
    }

    public function salvarRoupa()
{
    $model = new RoupaModel();

    $model->insert([
        'tipo'          => $this->request->getPost('tipo'),
        'cor'           => $this->request->getPost('cor'),
        'quantidade'    => $this->request->getPost('quantidade'),
        'bairro'        => $this->request->getPost('bairro'),
        'ponto_doacao'  => $this->request->getPost('ponto_doacao'),
        'idDoador'      => session()->get('id') // 🔥 AQUI É A CHAVE
    ]);

    return redirect()->to('/doador');
}
}