<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ],
            'User_ID' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'subtotal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'p_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ]
        ]);

        $this->forge->addKey('cart_id', true);
        $this->forge->addForeignKey('p_id', 'product', 'p_id');
        $this->forge->addForeignKey('User_ID', 'customer', 'User_ID');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
