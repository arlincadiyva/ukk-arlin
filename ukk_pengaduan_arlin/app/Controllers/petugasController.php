<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;
class PetugasController extends BaseController{
    
    protected $petugass;
    function __construct()
    {
        $this->petugass = new Petugas();
    }
    public function index()
    {
        $data['petugas'] = $this->petugass->findAll();
        return view('petugas_view',$data);
    }
    public function fpetugas()
    {
        return view('fpetugas');
    }
    public function simpan()
    {
        $this->petugass->insert([
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
            'level'=>$this->request->getPost('level'),
        ]);
        return redirect('petugas');
    }
    public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')){

        }
        $data= array(
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'telp'=>$this->request->getPost('telp'),
            'level'=>$this->request->getPost('level'),
        );
        $this->petugass->update($id,$data);
        session()->getFlashdata("massage","Data Berhasil Disimpan");
        return redirect('petugas');
        
    }
    public function delete($id)
    {
        $this->petugass->delete($id);
        session()->getFlashdata("message","Data Berhasil Disimpan");
        return redirect('petugas');
    }
}