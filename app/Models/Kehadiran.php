<?php namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    /**
     * table name
     */
    protected $table = "kehadiransiswa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'ID_siswa',
        'waktu_kehadiran',
    ];

    public function getSiswa()
    {
         return $this->db->table('siswa')
         ->join('kehadiransiswa','kehadiransiswa.ID_siswa=siswa.id_siswa')
        //  ->join('kepulangan', 'jurusan.IDJurusan=siswa.IDJurusan')
         ->get()->getResultArray();  
    }
}