<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends CI_Controller {

    public function change($page = 'english')
	{
        if (!($page=='english' || $page=='zh_hk'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->helper(array('html','url'));
        $this->load->library('session');
        if(!isset($this->session->userdata['lang'])&&$page=='english'){
            $this->session->set_userdata(array('lang'=>'chi'));
        }
        else if($page=='zh_hk'){
            $this->session->unset_userdata('lang');
        }
        $this->output->set_header('refresh:0; url='.$this->session->userdata['prev_url']);
	}
}

/* End of file lang.php */
/* Location: ./application/controllers/lang.php */