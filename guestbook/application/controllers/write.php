<?php
class Write extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('guestbook');
    }
    
    public function index() 
    {
        $this->load->view('guestbook/write');
    }
    
    public function save()
    {
       $data = $this->input->post();
       
       $save = array(
           'writer' => $data['writer'],
           'subject' => $data['subject'],
           'message' => $data['message']
       );
       
       $result = $this->guestbook->save($save);
       
       if ($result !== false) {
           redirect('/view/index/' . $result);
       }
    }
}