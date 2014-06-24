<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reminder_Model extends Parent_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    private function GetRemindType($int)
    {
        if ($int == 1) return 'day';
        else if ($int == 2) return 'week';
        else if ($int == 3) return 'month';
        else if ($int == 4) return 'year';
            
    }
    
    private function createSingleRemind($user_id, $phone_number, $send_datetime, $message)
    {
        $sql = 'insert into reminds (user_id, phone_number, send_datetime, status, message) 
                VALUES(?, ?, STR_TO_DATE(?, "%e.%c.%Y %H:%i"), "unsent", ?)';
        $this->run($sql, array($user_id, $phone_number, $send_datetime, $message));
    }
    
    private function createRepeatableRemind($user_id, $phone_number, $send_datetime, $message, $repeat)
    {
        $sql = 'insert into repeats (user_id, phone_number, daytime, day_week, day_month, day_year, month_year, year_year, remind_type, message, last_sent)
                VALUES(
                    ?, 
                    ?, 
                    TIME(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    DayOfWeek(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    DayOfMonth(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    DayOfYear(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    MONTH(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    YEAR(STR_TO_DATE(?, "%e.%c.%Y %H:%i")),
                    ?,
                    ?,
                    0)';
                    
        $this->run($sql, array($user_id, $phone_number, $send_datetime,$send_datetime,$send_datetime,$send_datetime,$send_datetime,$send_datetime, $this->GetRemindType($repeat), $message));
        
    }

    
    public function createRemind($user_id, $phone_number, $send_datetime, $message, $repeat)
    {
        if ($repeat == 0)
            $this->createSingleRemind($user_id, $phone_number, $send_datetime, $message);
        else
            $this->createRepeatableRemind($user_id, $phone_number, $send_datetime, $message, $repeat);          
    }
    
    public function get_unset_reminds()
    {
        $sql = "SELECT * FROM reminds WHERE send_datetime < NOW() AND status = 'unsent'"; 
        return $this->get($sql);
    }

    public function countUpcomingReminders($id)
    {
        $sql = "SELECT count(*) FROM reminds WHERE status = 'unsent' AND id = ?";
        return $this->get($sql, $id);
    }
    
    public function mark_as_sent_reminder($id)
    {
        $sql = "UPDATE reminds SET status = 'sent' WHERE id = ?";
        $this->run($sql, $id);
    }
    
    public function process_repeats()
    {
        $this->process_days();
        $this->process_weeks();
        $this->process_months();
        $this->process_years();
    }
    
    private function process_days()
    {
        $this->START();
        $sql1 = "SELECT @currdate := CURDATE();";
        
        $sql2 = "
                INSERT INTO 
                    reminds (user_id, phone_number, send_datetime, status, message)
                select 
                    user_id, 
                    phone_number, 
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) as send_time ,
                    'unsent' as status,
                    message    
                from repeats where 
                    remind_type = 'day' and     
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) <> last_sent;
                ";
        $sql3 = "        
                UPDATE repeats
                    SET last_sent = DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND)
                    WHERE remind_type = 'day';    
                ";              
        $this->run($sql1);
        $this->run($sql2);
        $this->run($sql3);
        $this->COMMIT();
    }
    
    private function process_weeks()
    {
        $this->START();
        $sql1 = "SELECT @currdate := CURDATE();";
        
        $sql2 = "
                INSERT INTO 
                    reminds (user_id, phone_number, send_datetime, status, message)
                select 
                    user_id, 
                    phone_number, 
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) as send_time ,
                    'unsent' as status,
                    message    
                from repeats where 
                    remind_type = 'week' and 
                    DayOfWeek(@currdate) = day_week and
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) <> last_sent;
                ";
        $sql3 = "
                UPDATE repeats
                    SET last_sent = DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND)
                    WHERE remind_type = 'week'
                    and DayOfWeek(@currdate) = day_week;
                "; 
        $this->run($sql1);
        $this->run($sql2);
        $this->run($sql3);
        $this->COMMIT();
    }
    
    private function process_months()
    {
        $this->START();
        $sql1 = "SELECT @currdate := CURDATE();";
        
        $sql2 = "      
                INSERT INTO 
                    reminds (user_id, phone_number, send_datetime, status, message)
                select 
                    user_id, 
                    phone_number, 
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) as send_time ,
                    'unsent' as status,
                    message    
                from repeats 
                where 
                    remind_type = 'month' and 
                    (
                        DayOfMonth(@currdate) = day_month or
                        (
                            DAY(LAST_DAY(@currdate)) = DAY(@currdate) and 
                            DAY(@currdate) < day_month
                        )
                    ) and
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) <> last_sent;
                ";
        $sql3 = "
                UPDATE repeats
                SET last_sent = DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND)
                WHERE 
                remind_type = 'month' and 
                (
                    DayOfMonth(@currdate) = day_month or
                    (
                        DAY(LAST_DAY(@currdate)) = DAY(@currdate) and 
                        DAY(@currdate) < day_month
                    )
                );
                ";
        $this->run($sql1);
        $this->run($sql2);
        $this->run($sql3);
        $this->COMMIT();
    }
    
    private function process_years()
    {
        $this->START();
        $sql1 = "SELECT @currdate := CURDATE();";
        
        $sql2 = "  
                INSERT INTO 
                    reminds (user_id, phone_number, send_datetime, status, message)
                select 
                    user_id, 
                    phone_number, 
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) as send_time ,
                    'unsent' as status,
                    message    
                from repeats 
                where 
                    remind_type = 'year' and 
                    (        
                        (
                            DayOfMonth(@currdate) = day_month and
                            MONTH(@currdate) = month_year            
                        )
                        or
                        (
                            DayOfMonth(LAST_DAY(@currdate)) = DayOfMonth(@currdate) and 
                            DayOfMonth(@currdate) < day_month and
                            MONTH(@currdate) = month_year        
                        )
                    ) and
                    DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND) <> last_sent;
                ";
        $sql3 = "
                UPDATE repeats
                SET last_sent = DATE_ADD(@currdate, INTERVAL daytime HOUR_SECOND)
                WHERE 
                remind_type = 'year' and 
                (
                        (
                            DayOfMonth(@currdate) = day_month and
                            MONTH(@currdate) = month_year            
                        )
                        or
                        (
                            DayOfMonth(LAST_DAY(@currdate)) = DayOfMonth(@currdate) and 
                            DayOfMonth(@currdate) < day_month and
                            MONTH(@currdate) = month_year        
                        )
                );
                ";    
        $this->run($sql1);
        $this->run($sql2);
        $this->run($sql3);
        $this->COMMIT();
    }
    
    public function getUpcomingReminders($userId) 
    {
        $sql = "SELECT * FROM reminds WHERE user_id = ? AND status = 'unsent' ORDER BY send_datetime LIMIT 5";
        return $this->get($sql, $userId);
    }
    
    public function getSentReminders($userId) 
    {
        $sql = "SELECT * FROM reminds WHERE user_id = ? AND status = 'sent' ORDER BY send_datetime limit 5";
        return $this->get($sql, $userId);
    }
        
}