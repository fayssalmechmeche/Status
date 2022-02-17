<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Services extends BaseCommand
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
    protected $name = 'services';

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
    protected $usage = 'services [arguments] [options]';

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

            $status = @fSockOpen($service->ip, 80, $errno, $errstr, 10);
            if ($status) {
                $db->query("UPDATE service SET state = ? WHERE id = ?", ['En ligne', $service->id]);
            } else {
                $db->query("UPDATE service SET state = ? WHERE id = ?", ['Hors-ligne', $service->id]);
            }

        endforeach;
    }
}
