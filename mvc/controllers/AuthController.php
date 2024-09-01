<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;

class AuthController{
    public function index(){
        View::render('auth/index');
    }

    public function store($data){

        $validator = new Validator;
        $validator->field('username', $data['username'])->email()->required()->max(50)->isExist('User', 'username');
        $validator->field('password', $data['password'])->min(5)->max(20);

        if($validator->isSuccess()){
            $user = new User;
            $checkuser = $user->checkuser($data['username'],$data['password']);

            if($checkuser){
                return View::redirect('client');
            }else{
                var_dump($data);
                $errors['message'] = "Please check your credentials";
                return View::render('auth/index', ['errors'=>$errors, 'user'=>$data]);
            }
        
        }else{
            $errors = $validator->getErrors();
            //print_r($data);
            //print_r($errors);
            return View::render('auth/index', ['errors'=>$errors, 'user'=>$data]);
        }
    }

    public function delete(){
        session_destroy();
        return View::redirect('login');
    }

    public function forgot($data=[]) {
        // $user = new User;
        // $select = $user->select();
        // var_dump($select);
        View::render('auth/forgot');
    }

    public function reset($data) {
        $validator = new Validator;
        $validator->field('username', $data['username'])->email()->required()->max(50)->isExist('User', 'username');
        if($validator->isSuccess()) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'mateofortin@gmail.com';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('mateofortin@gmail.com', 'Mailer');
                $mail->addAddress($data['username']);     //Add a recipient
    
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Forgotten password';
                $mail->Body    = 'You forgot your password';
                $mail->AltBody = 'You forgot your password';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            $errors = $validator->getErrors();
            return View::render('auth/forgot', ['errors'=>$errors, 'user'=>$data]);
       }
 
    }
}