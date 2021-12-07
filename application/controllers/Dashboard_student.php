<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_student extends CI_Controller {

    function index()
    {
        $this->template->load('layoutbackend_student', 'dashboard/dashboard_student');
    }
        
    


}
/* End of file Controllername.php */
 