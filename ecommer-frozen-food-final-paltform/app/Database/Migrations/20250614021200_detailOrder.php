<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'p_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'order_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'total_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('p_id', 'product', 'p_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('order_id', 'order', 'order_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('orderDetail');
    }

    public function down()
    {
        $this->forge->dropTable('orderDetail');
    }
}
