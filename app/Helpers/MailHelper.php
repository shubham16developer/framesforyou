<?php
namespace App\Helpers;

use App\Setting;
use Auth;

 class MailHelper
 {
       public static function sendEmailTo($body, $subject , $send_to)
       {
               // try {
               //     $transport = (new \Swift_SmtpTransport("smtppro.zoho.in", "465", 'ssl'))
               //         ->setUsername("info@jagjoyu.com")
               //         ->setPassword("JaGJoYuTs2019$$");
               //     $mailer = new \Swift_Mailer($transport);

               //     $message = (new \Swift_Message($subject))
               //         ->setFrom("info@jagjoyu.com", "info@jagjoyu.com")
               //         ->setTo($send_to)
               //         ->setContentType("text/html")
               //         ->setBody($body);

               //         return array('status' => $mailer->send($message));
               //      } catch (\Exception $e) {
               //     return array('status' => 'error', 'error' => $e->getMessage());
               // }
       }
	 
 }      