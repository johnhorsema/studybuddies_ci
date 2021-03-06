<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($page = 'home')
	{
        if ( ! file_exists(APPPATH.'/views/'.$page.'.html'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->helper(array('html','url'));
        $this->load->library('session');
        if(isset($this->session->userdata['lang'])){
            $this->lang->load('english','english');  
        }
        else{
            $this->lang->load('zh_hk','zh_hk');
        }
        //$this->lang->load('english','english'); 
        $this->load->view('templates/header.html', $data);
        if($page == 'contact' || $page == 'news' || $page == 'login' || $page == 'sign' || $page == 'home'){
            $this->load->database();   
        }
        if($page == 'news' || $page == 'info' || $page == 'gallery'){
            $this->load->library('parser');   
        }
        if($page == 'home'){
            $this->load->helper('file');  
        }
        $this->load->view($page.'.html', $data);
        $this->load->view('templates/footer.html', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */