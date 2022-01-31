<?php

namespace App\Models;

use CodeIgniter\Model;


class ServiceModel extends Model
{

    protected $table = 'service';
    protected $allowedFields = [
        'title', 'etat', 'ip', 'lien', 'categorie', 'monitoring'
    ];
}
