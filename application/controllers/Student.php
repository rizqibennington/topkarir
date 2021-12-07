<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_student');
    }


    public function index()
    {
        $data['student']      = $this->Mod_student->getAll();
        // print_r($data['countanggota']); die();
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend_teacher', 'student/student_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend_teacher', 'student/student_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend_teacher', 'student/student_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend_teacher', 'student/student_data', $data);
        }
    }

    public function create()
    {
        $this->template->load('layoutbackend_teacher', 'student/student_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
            
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $id = $this->input->post('id');
                $cek = $this->Mod_student->cekStudent($id);
                //cek npm yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>ID</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend_teacher', 'student/student_create', $data); 
                }
                else{
                    
                        $save  = array(
                            'id'   => $this->input->post('id'),
                            'nama'  => $this->input->post('nama'),
                            'password'   => get_hash($this->input->post('password'))
                        );
                        $this->Mod_student->insertStudent("mst_student", $save);
                        // echo "berhasil"; die();
                        redirect('student/index/create-success'); 
                }
            }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend_teacher', 'student/student_create', $data);
            }
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
        $this->template->load('layoutbackend_teacher', 'student/student_edit', $data);
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
                    $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend_teacher', 'student/student_edit', $data);
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
                        $this->Mod_student->updateStudent($id, $save);
                        redirect('student/index/update-success');   
                }
                //jika tidak mengkosongkan
                else{
                    $id = $this->input->post('id');
                    $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend_teacher', 'student/student_edit', $data);
                }
            }    

        } //end post update

    }//end function update

    public function delete()
    {
        // $npm  = $this->uri->segment(3);

        $id = $this->input->post('kode');

        //hapus gambar yg ada diserver

        $this->Mod_student->deleteStudent($id, 'mst_student');
        // echo "berhasil"; die();
        redirect('student/index/delete-success');
        
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
 