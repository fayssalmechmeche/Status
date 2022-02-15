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
    function checkServ($host, $port = 80, $timeout = 10)
    {
        //$fp = fSockOpen($host, $port, $errno, $errstr, $timeout);
        //return $fp!=false;

        error_reporting(E_ALL ^ E_WARNING);  // ligne qui enleve les messages d'erreur car il affiche un Warning (moche) si le serveur est down

        if (fSockOpen($host, $port, $errno, $errstr, $timeout)) //on check si le serv est up ou pas
        {
            return true;
        }
        return false;
    }
}
