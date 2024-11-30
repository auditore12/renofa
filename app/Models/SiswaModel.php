<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    /**
     * table name
     */
    protected $table = "siswa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'id',
        'nama_siswa',
        'kelas_siswa',
        'id_siswa'

    ];

    public function getSiswa()
    {
         return $this->db->table('siswa')
         ->join('kehadiran','kehadiran.ID_siswa=siswa.id_siswa')
        //  ->join('kepulangan', 'jurusan.IDJurusan=siswa.IDJurusan')
         ->get()->getResultArray();  
    }


}