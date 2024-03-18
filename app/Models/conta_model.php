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
}
