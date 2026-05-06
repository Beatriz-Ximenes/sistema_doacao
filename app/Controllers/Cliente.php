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
        $model = new Cliente_Model();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $cliente = $model->where('email', $email)->first();

        if ($cliente && password_verify($senha, $cliente['senha'])) { // simples por enquanto

            session()->set([
                'id'    => $cliente['id'],
                'nome'  => $cliente['nome'],
                'logado'=> true
            ]);

            return redirect()->to('/cliente');
        }

        return redirect()->back()->with('erro', 'Login inválido');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/cliente/login');
    }

    public function index()
    {
        $this->verificarLogin();

        return view('cliente/dashboard');
    }

    public function cadastrar()
    {
        $this->verificarLogin();

        return view('cliente/cadastrar');
    }

    private function verificarLogin()
    {
        if (!session()->get('logado')) {
            header('Location: ' . base_url('cliente/login'));
            exit;
        }
    }

    public function cadastrarDoador()
{
    $this->verificarLogin();
    return view('cliente/doador/cadastrar');
}

public function salvarDoador()
{
    $doadorModel = new DoadorModel();
    $enderecoModel = new EnderecoModel();

    // salva doador
    $doadorId = $doadorModel->insert([
        'nome'      => $this->request->getPost('nome'),
        'email'     => $this->request->getPost('email'),
        'celular'   => $this->request->getPost('celular'),
        'data_nas'  => $this->request->getPost('data_nas'),
    ]);

    // salva endereço
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

    return redirect()->to('/cliente');
}

    
}