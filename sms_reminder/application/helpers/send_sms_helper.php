<?php
    function send_sms($phone_number, $text)
    {
        $text = urlencode($text);
        file_get_contents("http://sms.ru/sms/send?api_id=f2d6d066-9441-e374-b514-e9a6fc26aa17&to=$phone_number&text=$text");
    }
    