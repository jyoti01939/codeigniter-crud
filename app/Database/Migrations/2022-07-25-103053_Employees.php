<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'auto_increment' =>true
            ],
            'name' =>[
                'type' => 'VARCHAR',
                'constraint' =>50  
            ],
            'email' =>[
                'type' => 'VARCHAR',
                'constraint' =>255
            ],
            'phone' =>[
                'type' => 'VARCHAR',
                'constraint' =>12 
            ],
            'designation' => [
                'type' => 'MEDIUMTEXT',
                'constraint' =>500 
            ],
            'created_at datetime default current_timestamp',

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
