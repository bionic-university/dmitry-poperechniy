<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class User_Model
 */
class User_Model extends Parent_Model
{
    /**
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Check Registration
     *
     * @param $login
     * @param $password
     * @return bool
     */
    public function check_registration($login, $password)
    {
        return $this->get_value("SELECT count(*) FROM users WHERE login = ? AND password = ?", array($login, $password)) > 0;
    }

    /**
     * Registrate User in temporary registration
     *
     * @param $login
     * @param $email
     * @param $phone
     * @param $password
     * @param $guid
     */
    public function registrate_user($login, $email, $phone, $password, $guid)
    {
        $sql = 'insert into temporary_registration(login, password, email, phone_number, daytime, guid) values(?,?,?,?, NOW(), ?)';
        
        $this->run($sql, array($login, $password,  $email, $phone, $guid));
    }

    /**
     * Complete Registration
     *
     * @param $guid
     * @return bool
     */
    public function complete_registration($guid)
    {
        $data = $this->get_single_row('select * from temporary_registration where guid = ?', $guid);
        if ($data === FALSE)
            return FALSE;

        $this->run('delete from temporary_registration where guid = ?', $guid);
        $this->run("insert into users(login, password, email, phone_number, privileges) VALUES(?, ?, ?, ?, 'user')",  
                   array($data['login'], $data['password'], $data['email'], $data['phone_number']));
        
        return $this->get_single_row('select id, login from users order by id desc limit 1');       
    }

    /**
     * Check Login
     *
     * @param $login
     * @param $pass
     * @return bool
     */
    public function check_login($login, $pass)
    {
       return $this->get_single_row('select id, login from users where login = ? and password = ?', array($login, $pass));
    }

    /**
     * Cancel User Account with its Reminds/Repeats
     *
     * @param $id
     */
    public function cancel_account($id)
    {
        $this->START();

        $sql1 = "DELETE FROM reminds where user_id = ?";
        $sql2 = "DELETE FROM repeats where user_id = ?";
        $sql3 = "DELETE FROM users where id = ?";

        $this->run($sql1, $id);
        $this->run($sql2, $id);
        $this->run($sql3, $id);

        $this->COMMIT();
    }
}
