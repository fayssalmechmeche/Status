<?php

namespace App\Models;

use CodeIgniter\Model;


class ServiceModel extends Model
{

    protected $table = 'service';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title', 'state', 'ip', 'link', 'category', 'monitoring', 'updated', 'description'
    ];
    public function countsService()
    {
        $builder = $this->db->table('service');

        $query = $builder->countAllResults();
        return $query;
    }
}