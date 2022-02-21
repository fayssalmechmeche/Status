<?php

namespace App\Models;

use CodeIgniter\Model;


class LogoModel extends Model
{

    protected $table = 'logo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}
