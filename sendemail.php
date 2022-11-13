<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("famouswalters@gmail.com", "Cian Walters");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //The below is another way of doing the above
            // $email->addContent("text/html", $content); 

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught: '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>