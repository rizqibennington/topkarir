<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_teacher');
    }


    public function index()
    {
        $data['teacher']      = $this->Mod_teacher->getAll();
        // print_r($data['countanggota']); die();
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend_teacher', 'teacher/teacher_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend_teacher', 'teacher/teacher_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend_teacher', 'teacher/teacher_data', $data);
        }
        else if($this->uri->segment(3)=="cannot-delete"){
            $data['message'] = "<div class='alert alert-block alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Tidak bisa menghapus data sendiri!</p></div>"; 
            $this->template->load('layoutbackend_teacher', 'teacher/teacher_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend_teacher', 'teacher/teacher_data', $data);
        }
    }

    public function create()
    {
        $this->template->load('layoutbackend_teacher', 'teacher/teacher_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
            
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $id = $this->input->post('id');
                $cek = $this->Mod_teacher->cekTeacher($id);
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>ID</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend_teacher', 'teacher/teacher_create', $data); 
                }
                else{
                    
                        $save  = array(
                            'id'   => $this->input->post('id'),
                            'nama'  => $this->input->post('nama'),
                            'password'   => get_hash($this->input->post('password'))
                        );
                        $this->Mod_teacher->insertTeacher("mst_teacher", $save);
                        // echo "berhasil"; die();
                        redirect('teacher/index/create-success'); 
                }
            }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend_teacher', 'teacher/teacher_create', $data);
            }
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['edit']    = $this->Mod_teacher->cekTeacher($id)->row_array();
        $this->template->load('layoutbackend_teacher', 'teacher/teacher_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {
                $this->_set_rules();
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    $id = $this->input->post('id');                                         
                }
                //jika tidak mengkosongkan
                else{
                    $id = $this->input->post('id');
                    $data['edit']    = $this->Mod_teacher->cekTeacher($id)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend_teacher', 'teacher/teacher_edit', $data);
                }
            }else{
                $this->_set_rules();
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    $id = $this->input->post('id');
                        $save  = array(
                            'id'   => $this->input->post('id'),
                            'nama'  => $this->input->post('nama'),
                            'password'   => get_hash($this->input->post('password'))
                        );
                        $this->Mod_teacher->updateTeacher($id, $save);
                        redirect('teacher/index/update-success');   
                }
                //jika tidak mengkosongkan
                else{
                    $id = $this->input->post('id');
                    $data['edit']    = $this->Mod_teacher->cekTeacher($id)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend_teacher', 'teacher/teacher_edit', $data);
                }
            }    

        } //end post update

    }//end function update

    public function delete()
    {
     
        $id = $this->input->post('kode');
        
        $this->Mod_teacher->deleteTeacher($id, 'mst_teacher');
        // echo "berhasil"; die();
        redirect('teacher/index/delete-success');
        
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('id','Id','required|max_length[10]');
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
         $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file Anggota.php */
 