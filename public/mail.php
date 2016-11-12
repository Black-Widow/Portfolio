<?php
require_once ('../vendor/autoload.php');
require '_inc.php';

$errors = [];

$validator = new Validator($_POST);
$validator->check('nom', 'required');
$validator->check('email', 'required');
$validator->check('email', 'email');
$validator->check('sujet', 'required');
$validator->check('message', 'required');
$errors = $validator->errors();


$body = isset($_POST['message']) ? $_POST['message'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$name = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$sujet = isset($_POST['sujet']) ? $_POST['sujet'] : NULL;

if ($_SERVER['SERVER_NAME'] == 'localhost') {
   $transport = Swift_MailTransport::newInstance();
} else {
   $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
      ->setUsername('benjamindanielis@gmail.com')
      ->setPassword('sheppard.47');
}

$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance($sujet)
   ->setFrom([$email => $name])
   ->setTo(['benjamindanielis@gmail.com'])
   ->setCharset('utf-8')
   ->setContentType('text/html')
   ->setBody($body);




if(!empty($errors)){
   $_SESSION['errors'] = $errors;
   $_SESSION['inputs'] = $_POST;
   header('Location: index.php#contact');
}else{
   $_SESSION['success'] = 1;
   $result = $mailer->send($message);
   header('Location: index.php#contact');
}





