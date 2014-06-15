<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reminder_controller extends VERTEX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reminder_Model');
    }

    public function index()
    {
        $this->view_page('index', 'My Blog Title', 'My Blog Description');
    }
        
    public function create()
    {
        $userId = $this->session->userdata('user_id');
        $phone = $this->input->post('phonenumberInput', TRUE);
        $dateTime = $this->input->post('datetimepicker', TRUE);
        $message = $this->input->post('textInput', TRUE);
        $repeat = $this->input->post('repeatInput', TRUE);
        
        $this->Reminder_Model->createRemind($userId, $phone, $dateTime, $message, $repeat);
    }
    
    public function process_reminds()
    {
        $data = $this->Reminder_Model->get_unset_reminds();  
        for ($i = 0; $i < count($data); $i++) {
            $this->send_remind($data[$i]['id'], $data[$i]['phone_number'], $data[$i]['message']);
        }
    }
    
    private function send_remind($id, $phone_number, $message)
    {
       send_sms($phone_number, $message);
       $this->Reminder_Model->mark_as_sent_reminder($id);
    }
    
    public function process_repeats()
    {        
        $this->Reminder_Model->process_repeats();
    }   

}
