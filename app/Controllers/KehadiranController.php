<?php namespace App\Controllers;

use App\Models\KehadiranModel;
use App\Models\SiswaModel;
use App\Models\KehadiranModelModel;
use CodeIgniter\Controller;

class SiswaController extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $siswaModel = new KehadiranModel();
        $data['siswa'] = $siswaModel->getSiswa();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'kehadiransiswa' => $siswaModel->paginate(10, 'kehadiransiswa'),
            'pager' => $siswaModel->pager
        );

        return view('kehadiran-index', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        return view('siswa-create');
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'nama Siswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama .'
                ]
            ],
            'kelas'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas.'
                ]
            ],
            'id_siswa'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas.'
                ]
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return view('siswa-create', [
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $siswaModel = new SiswaModel();
            
            //insert data into database
            $siswaModel->insert([
                'nama_siswa'   => $this->request->getPost('nama_siswa'),
                'kelas_siswa' => $this->request->getPost('kelas_siswa'),
                'id_siswa' => $this->request->getPost('id_siswa'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Disimpan');

            return redirect()->to(base_url('siswa'));
        }

    }

    /**
     * edit function
     */
    public function edit($id)
    {
        //model initialize
        $siswaModel = new SiswaModel();

        $data = array(
            'post' => $siswaModel->find($id)
        );

        return view('post-edit', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan konten Post.'
                ]
            ],
        ]);

        if(!$validation) {

            //model initialize
            $siswaModel = new SiswaModel();

            //render view with error validation message
            return view('post-edit', [
                'post' => $siswaModel->find($id),
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $siswaModel = new siswaModel();
            
            //insert data into database
            $siswaModel->update($id, [
                'title'   => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Diupdate');

            return redirect()->to(base_url('post'));
        }

    }

    /**
     * delete function
     */
    public function delete($id)
    {
        //model initialize
        $siswaModel = new SiswaModel();

        $post = $siswaModel->find($id);

        if($post) {
            $siswaModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Dihapus');

            return redirect()->to(base_url('post'));
        }
    }
}