<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_teacher extends CI_Controller {

    function index()
    {
        $this->template->load('layoutbackend_teacher', 'dashboard/dashboard_teacher');
    }
        
    


}
/* End of file Controllername.php */
 