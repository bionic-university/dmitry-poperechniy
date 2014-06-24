<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VERTEX_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        //$this->load->model('Parent_Model');
    }

    protected function view_header($title, $description)
    {
        if ($this->session->userdata('user_id') !== FALSE)
        {
            $login_page =  $this->parser->parse('login_logined', array('username' => $this->session->userdata('user_name')), TRUE);
        } else
        {
            $login_page =  $this->parser->parse('login_unlogined', array('notification' => $this->session->flashdata('notification')), TRUE);
        }
        
        echo $this->parser->parse('header', array('login_page' => $login_page), TRUE);
    }

    protected function view_footer()
    {
        echo $this->parser->parse('footer', array(), TRUE);
    }

    protected function view_page($page, $title, $description, $params = NULL)
    {
        $this->view_header($title, $description);
        echo $this->parser->parse($page, $params === NULL ? array() : $params, TRUE);
        $this->view_footer();
    }

    public function page404()
    {
        echo $this->view_page('site/pages/404','404', array());
        exit;
    }
}

