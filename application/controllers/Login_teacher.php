<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_login_teacher'));
        
    }

public function index()
    {
        if(isset($_POST['proses'])) {
            
            //form validation
            $this->form_validation->set_rules('id', 'Id', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<span class="peringatan">', '</span>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('formlogin/login_teacher');
            }
            else{
                $id = $this->input->post('id');

                if($this->Mod_login_teacher->check_db($id)->num_rows()==1) {

                    //cek verfied bycrpt menyamakan data yg di input dengan ada yg di database 
                    $db = $this->Mod_login_teacher->check_db($id)->row();
        
                     if(hash_verified($this->input->post('password'), $db->password)) {

                        $userdata = array(
                            'id'       => $db->id,
                            'nama'      => $db->nama,
                            'password'  => $db->password
                        );

                    $this->session->set_userdata($userdata);

                    redirect('dashboard_teacher');
                    }
                    else{
                        $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Maaf</strong> Password Wrong. </div>";
                        $this->load->view('formlogin/login_teacher', $data);
                    }

                }
                else{
                    $data['pesan'] = "<div class='alert alert-danger'>
                                                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                                                <strong>Sorry</strong> ID Not Found. </div>";
                        $this->load->view('formlogin/login_teacher', $data); 
                }    

               // } //end cek sql injeqtion
            }
        }
        else{
            $this->load->view('formlogin/login_teacher');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_teacher');
    }

}

/* End of file Login.php */
