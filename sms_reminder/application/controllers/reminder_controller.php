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
        $upcoming_reminders = $this->parser->parse('user_reminds/upcoming_reminds_empty', array(), TRUE);
        $sent_reminders = $this->parser->parse('user_reminds/sent_reminds_empty', array(), TRUE);       
     
        if ($this->session->userdata('user_id') !== FALSE) {
            $upcomingReminders = $this->Reminder_Model->getUpcomingReminders($this->session->userdata('user_id'));
            if ($upcomingReminders !== FALSE) 
                $upcoming_reminders = $this->parser->parse('/user_reminds/upcoming_reminds_not_empty', array('reminds' => $upcomingReminders), TRUE);

            $sentReminders = $this->Reminder_Model->getSentReminders($this->session->userdata('user_id'));
            if ($sentReminders !== FALSE) 
                $sent_reminders = $this->parser->parse('/user_reminds/sent_reminds_not_empty', array('reminds' => $sentReminders), TRUE);
        }
        
        $notification = $this->session->flashdata('notification_new_reminder');
        $this->view_page('index', 'My Blog Title', 'My Blog Description', array('upcoming_reminders' => $upcoming_reminders, 'sent_reminders' => $sent_reminders, 'notification_new_reminder' => $notification));        
    }
        
    public function create()
    {
        if ($this->session->userdata('user_id') !== FALSE) {
            $userId = $this->session->userdata('user_id');
            $phone = $this->input->post('phonenumberInput', TRUE);
            $dateTime = $this->input->post('datetimepicker', TRUE);
            $message = $this->input->post('textInput', TRUE);
            $repeat = $this->input->post('repeatInput', TRUE);
        
            $this->Reminder_Model->createRemind($userId, $phone, $dateTime, $message, $repeat);
        } else {
            $this->session->set_flashdata('notification_new_reminder', 'Only logined users can create sms reminders.');   
        }
        redirect('/'); 
        
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
