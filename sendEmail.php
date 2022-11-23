<?php 
    require("./vendor/autoload.php");

    use SendGrid\Mail\Mail;
    class SendEmail
    {
        public static function SendMail($to,$subject,$content)
        {
            $key = "";
            $email  = new \SendGrid\Mail\Mail();
            $email->setFrom("thompsonAziel0@gmail.com","Aziel Thompson");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            
            $sendgrid = new \SendGrid($key);


            try
            {
                $response = $sendgrid->send($email);
                return $response;
            }
            catch (Exception $e)
            {
                echo "Email exception Caught: ".$e->getMessage()."\n";
                return true;
            }
        }
    }
?>