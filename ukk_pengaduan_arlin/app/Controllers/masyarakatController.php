<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;
class masyarakatController extends BaseController{
    
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }
    public function index()
    {
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('masyarakat_view',$data);
    }

    public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')){

        }
        $data= array(
            'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'telp'=>$this->request->getPost('telp'),
        );
        $this->masyarakats->update($id,$data);
        session()->getFlashdata("massage","Data Berhasil Disimpan");
        return redirect('masyarakat');
        
    }
    public function delete($id)
    {
        $this->masyarakats->delete($id);
        session()->getFlashdata("message","Data Berhasil Disimpan");
        return redirect('masyarakat');
    }
}