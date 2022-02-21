<?php

namespace App\Models;

use CodeIgniter\Model;


class MetaModel extends Model
{

    protected $table = 'meta_tag';
    protected $primaryKey = 'id';
    protected $allowedFields = ['meta_title', 'meta_description'];
}
