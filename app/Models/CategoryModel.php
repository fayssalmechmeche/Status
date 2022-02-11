<?php

namespace App\Models;

use CodeIgniter\Model;


class CategoryModel extends Model
{

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title'
    ];

    public function countsCategory()
    {
        $builder = $this->db->table('category');

        $query = $builder->countAllResults();
        return $query;
    }
}
