<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends VERTEX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('PHPMailer');
    }

    protected function view_page($page, $title, $description, $params = NULL)
    {
        $this->view_header($title, $description);
        echo $this->parser->parse($page, $params === NULL ? array() : $params, TRUE);
        $this->view_footer();
    }

    public function registration_form()
    {
        $this->view_page('registration_form', 'Registration Form', array());
    }
    
    public function registrate()
    {
        $login = $this->input->post('loginInput', FALSE);
        $email = $this->input->post('emailInput', FALSE);
        $phone = $this->input->post('phoneInput', FALSE);
        $password = $this->input->post('passwordInput', FALSE);
        $guid = uniqid();        
        
        $user = $this->User_Model->registrate_user($login, $email, $phone, md5($password), $guid);

        send2($email, "To continue registration pls follow the link http://magento.local/confirm-registration/$guid", 'Registrations on SMSReminder');
        //TODO: if there exists same user, or same password - redirect to other page
        redirect('/registration-confirm-page');
    }
    
    public function registration_confirm_page()
    {
        $this->view_page('registration-confirm-page', 'Registration Confirm page', array());
    }

    public function logoff()
    {
        $this->session->unset_userdata('user_id');    
        $this->session->unset_userdata('user_name');                
        
        redirect('/');        
    }
    
    public function confirm_registration($guid)
    {
        $data = $this->User_Model->finilize_registration($guid);
        if ($data === false)
            return; //TODO: process fail
            
        $this->session->set_userdata('user_id', $data['id']);    
        $this->session->set_userdata('user_name', $data['login']);                
        
        redirect('/');
    }

    public function login()
    {
        $login = $this->input->post('login', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->User_Model->check_login($login, md5($password));
        if ($user === FALSE)
        {
            //TODO: process situation
            redirect(base_url('/'), 'location', 303);
        }
        else
        {
            $this->session->set_userdata('user_id', $user['id']);    
            $this->session->set_userdata('user_name', $user['login']);                

            redirect('/');
        }
    }

    public function cancel()
    {
        $id = $this->session->userdata('user_id');
        $this->User_Model->cancel_account($id);

        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');

        redirect('/cancel-confirm-page');
    }

    public function cancel_confirm_page()
    {
        $this->view_page('cancel-confirm-page', 'Cancel account confirm page', array());
    }

}
