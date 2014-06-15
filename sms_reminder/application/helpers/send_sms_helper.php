<?php
    
    function send_sms($phone_number, $text)
    {
        echo $phone_number . " " . $text . "<br/>";
        log_message($level = 'message', $phone_number . " " . $text);
    }
    