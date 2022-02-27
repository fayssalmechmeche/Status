<?php

namespace App\Models;

use CodeIgniter\Model;


class ServiceModel extends Model
{

    protected $table = 'service';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title', 'state', 'ip', 'link', 'category', 'monitoring', 'updated', 'description', 'id'
    ];
    public function countsService()
    {
        $builder = $this->db->table('service');

        $query = $builder->countAllResults();
        return $query;
    }
    public function countsServiceOnline()
    {
        $builder = $this->db->table('service')->where('state', 'En ligne');

        $query = $builder->countAllResults();
        return $query;
    }
    public function countsServiceOffline()
    {
        $builder = $this->db->table('service')->where('state', 'Hors-ligne');

        $query = $builder->countAllResults();
        return $query;
    }
}
