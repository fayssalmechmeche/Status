<?php

namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model
{

    protected $table = 'login';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password'];

    public function countsUser()
    {
        $builder = $this->db->table('login');

        $query = $builder->countAllResults();
        return $query;
    }
}
