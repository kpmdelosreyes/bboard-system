<?php
class lists extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $data = array();
        $data['data'] = $this->guestbook->get_data();
        $this->load->view('guestbook/list', $data);
    }
    
    public function delete()
    {
        $param = $this->input->post('post');
        $param = explode("-", substr($param, 0, strlen($param)-1));
        $result = $this->guestbook->delete($param);
        
        if ($result === true) {
            echo "1";
        }
    }
    
    public function search()
    {
        $param = $this->input->post();
        
        $data['data'] = $this->guestbook->get_data_search($param);
        
        $this->load->view('guestbook/reload_list', $data);
    }
    
    public function reload_list()
    {
        $data = array();
        $data['data'] = $this->guestbook->get_data();
        $this->load->view('guestbook/reload_list', $data);
    }
}
