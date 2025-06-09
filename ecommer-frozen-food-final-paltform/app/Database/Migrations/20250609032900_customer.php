<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'User_ID' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'Name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'Email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'Password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('User_ID', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
