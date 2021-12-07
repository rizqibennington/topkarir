<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_student');
    }

    public function edit()
    {
        if($this->uri->segment(3)=="update-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Data berhasil diperbarui...!</p></div>";    
            $this->template->load('layoutbackend_student', 'dashboard/dashboard_student', $data); 
        }
        $id = $this->uri->segment(3);
        $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
        $this->template->load('layoutbackend_student', 'student/profil_student', $data);
    }

    // public function update()
    // {
    //     if(isset($_POST['update'])) {

    //         //apabila ada gambar yg diupload
    //         if(!empty($_FILES['userfile']['name'])) {
    //             $this->_set_rules();
    //             //apabila user mengkosongkan form input
    //             if($this->form_validation->run()==true){
    //                 $id = $this->input->post('id');                                         
    //             }
    //             //jika tidak mengkosongkan
    //             else{
    //                 $id = $this->input->post('id');
    //                 $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
    //                 $data['message']="";
    //                 $this->template->load('layoutbackend_student', 'student/profil_student', $data);
    //             }
    //         }else{
    //             $this->_set_rules();
    //             //apabila user mengkosongkan form input
    //             if($this->form_validation->run()==true){
    //                 // echo "masuk"; die();
    //                 $id = $this->input->post('id');
    //                     $save  = array(
    //                         'id'   => $this->input->post('id'),
    //                         'nama'  => $this->input->post('nama'),
    //                         'password'   => get_hash($this->input->post('password'))
    //                     );
    //                     $this->Mod_student->updateStudent($id, $save);
    //                     redirect('profil_student/edit/update-success');   
    //             }
    //             //jika tidak mengkosongkan
    //             else{
    //                 $id = $this->input->post('id');
    //                 $data['edit']    = $this->Mod_student->cekStudent($id)->row_array();
    //                 $data['message']="";
    //                 $this->template->load('layoutbackend_student', 'student/profil_student', $data);
    //             }
    //         }    

    //     } //end post update

    // }//end function update

    // //function global buat validasi input
    // public function _set_rules()
    // {
    //     $this->form_validation->set_rules('id','Id','required|max_length[10]');
    //     $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
    //      $this->form_validation->set_rules('password','Password','required|trim');
    //     $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
    //     $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    // }



}

/* End of file Anggota.php */
 