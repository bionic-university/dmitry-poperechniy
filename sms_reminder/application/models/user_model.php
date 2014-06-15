<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends Parent_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function registrate_user($login, $email, $phone, $password, $guid)
    {
        $sql = 'insert into temporary_registration(login, password, email, phone_number, daytime, guid) values(?,?,?,?, NOW(), ?)';
        
        $this->run($sql, array($login, $password,  $email, $phone, $guid));
    }
    
    public function finilize_registration($guid)
    {
        $data = $this->get_single_row('select * from temporary_registration where guid = ?', $guid);
        if ($data === FALSE)
            return FALSE;
        
        $this->run('delete from temporary_registration where guid = ?', $guid);
        $this->run("insert into users(login, password, email, phone_number, privileges) VALUES(?, ?, ?, ?, 'user')",  
                   array($data['login'], $data['password'], $data['email'], $data['phone_number']));
        
        
        return $this->get_single_row('select id, login from users order by id desc limit 1');       
    }
    
    public function check_login($login, $pass)
    {
       return $this->get_single_row('select id, login from users where login = ? and password = ?', array($login, $pass));
    }

    public function get_email($id)
    {
        return $this->get_value('select email from users where id = ?', $id);
    }

    public function cancel_account($id)
    {
        return $this->run('Delete from users where id = ?',$id);
    }
}
