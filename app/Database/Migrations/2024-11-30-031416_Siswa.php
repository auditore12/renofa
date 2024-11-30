<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                 'type'           => 'INT',
                 'constraint'     => 11,
                 'unsigned'       => TRUE,
                 'auto_increment' => TRUE
              ],
              'nama_siswa'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'kelas_siswa'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'id_siswa'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        //
    }
}
