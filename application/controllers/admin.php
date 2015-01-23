<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index($page = 'dash')
	{
        if ( ! file_exists(APPPATH.'views/admin_panel/pages/'.$page.'.html'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $dir = 'admin_panel/pages/';
        $data['title'] = ucfirst($page); // Capitalize the first letter
        
        $this->load->helper(array('html','url'));
        $this->load->database();   
        $this->load->library('parser');
        $this->load->view($dir.'header.html', $data);
        $this->load->view($dir.$page.'.html', $data);
        $this->load->view($dir.'footer.html', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */