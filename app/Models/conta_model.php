<?php

namespace App\Models;

use CodeIgniter\Model;

final class Conta_model extends Model
{
    function get_login_usuario_byEmail($email)
    {
        $db = $this->db->table('usuarios');
        $db->where('email', $email);
        return $db->get()->getRowArray();
    }

    function cadastrar_usuario($nome, $email, $senha, $telefone)
    {
        return $this->db->table('usuarios')
            ->set('email', $email)
            ->set('senha', $senha)
            ->set('nome', $nome)
            ->set('telefone', $telefone)
            ->set('tipo_usuario', 2)
            ->insert();
    }
}
