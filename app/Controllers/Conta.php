<?php

namespace App\Controllers;

use App\Models\Conta_model;

final class Conta extends BaseController
{
    private $conta_m;
    private $session;
    public function __construct()
    {
        $this->conta_m = new Conta_model();
        $this->session = session();
    }

    function index()
    {
        return view('registrar_usuario');
    }

    function login()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuario_dados = $this->conta_m->get_login_usuario_byEmail($email);
        $dados = password_verify($senha, $usuario_dados['senha']);

        if ($dados) {
            $sessao = [
                "logged" => true,
                "user_id" => $usuario_dados['id'],
                "email" => $usuario_dados['email'],
                "nome" => $usuario_dados['nome']
            ];
            $this->session->set($sessao);
        }
        echo json_encode($dados);
    }

    function logout()
    {
        echo json_encode($this->session->destroy());
    }

    function cadastrar_usuario()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $senha = password_hash($senha, PASSWORD_BCRYPT);
    }
}
