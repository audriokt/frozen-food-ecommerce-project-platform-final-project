<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'User_ID' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
            ],
            'order_date' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'total_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'processing', 'shipped', 'completed', 'cancelled'],
                'default'    => 'pending',
            ],
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'shipping_address' => [
                'type' => 'TEXT',
                'null' => false,
            ]
        ]);

        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('User_ID', 'customer', 'User_ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
