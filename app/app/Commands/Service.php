<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Service extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'CodeIgniter';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'service';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'service [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $db = \Config\Database::connect();
        $services = $db->query("SELECT * FROM service WHERE monitoring = 1")->getResult();


        foreach ($services as $service) :
            echo '
            Vérification du service : ' . $service->title . ' (' . $service->ip . ') ' . '
            ';




            $status = @fSockOpen($service->ip, 80, $errno, $errstr, 10);
            if ($status) {
                $db->query("UPDATE service SET state = ? WHERE id = ?", ['En ligne', $service->id]);
            } else {
                $db->query("UPDATE service SET state = ? WHERE id = ?", ['Hors-ligne', $service->id]);
            }
            echo 'Nom du service : ' . $service->title . ' -> ' . $service->state;

        endforeach;
    }
}
