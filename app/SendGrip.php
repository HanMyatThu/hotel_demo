<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class SendGrip extends Model
{
    public function sendEmail($to,$name)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("noreply@hotelservice.com", "No-Reply");
        $email->setSubject("Your Booking Request is received");
        $email->addTo($to, $name);
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html",
            "<div><div style='max-width: 500px; margin: 0 auto; padding: 15px; text-align: center;'>
            <img src='https://i.pinimg.com/236x/31/44/0d/31440d1c7eae15bfcc118f1cb543df9c--hotel-logos-hotel-logo-design.jpg' alt='pleodata' style='max-width: 100px;'>
            <div style='border:1px solid rgba(0, 0, 0, 0.118); border-radius: 10px;'><div style='margin: 10px 15px;'><h3 style='font-size: 22px; color:rgba(0, 0, 0, 0.818); font-weight: 400;'> We have received your booking request!<br>
            Please wait awhile when we are processing.</h3><hr><p style='font-size: 17px; color:rgba(0, 0, 0, 0.618); font-weight: 400;'>To check your current booking status, please go to
            </p></div><div style='margin: 30px 0; text-align: center;'><a href='' style='box-sizing: border-box;border-color: #348eda;
            font-weight: 400;text-decoration: none;display: inline-block;margin: 0;color: #ffffff; background-color: #348eda;border: solid 1px #348eda;border-radius: 2px;font-size: 14px;padding: 12px 45px;'> Check Booking Status</a>
            </div></div></div></div>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}
