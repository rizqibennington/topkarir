<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_login_student extends CI_Model {

    function Auth($id, $password)
    {
        // //query native coba sql injection
        // $login = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password' "; 
        // return $this->db->query($login);

        //menggunakan active record . untuk menghindari sql injection
        $this->db->where("id", $id);
        $this->db->where("password", $password);
        return $this->db->get("mst_student");    
    }

    function check_db($id)
    {
        return $this->db->get_where('mst_student', array('Id' => $id));
    }

}

/* End of file Mod_login.php */
