<?php include '../back-end/db.php'?>
<?php include '../back-end/requetes.php'?>

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require'./phpMailer/Exception.php';
require'./phpMailer/PHPMailer.php';
require'./phpMailer/SMTP.php';

if(isset($_POST['email'])){

    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9-' .!?]*$/", $message)) {
        echo "Le message ne peut contenir que des lettres, des chiffres et des caractères spéciaux (. ! ?).";
        exit();
    }

    if(empty($email) || empty($message)){
        echo "Tous les champs sont obligatoires.";
        exit();
    }



    $message = "Email : ".$email."\n"." message : ".$message;  
    

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();                                         
        $mail->Host       = 'smtp.gmail.com';               
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'drys.ferhi@gmail.com';                    
        $mail->Password   = 'sdms wcpg mjrt krpy';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;                                    
    
        $mail->setFrom('from@example.com', 'PORTFOLIO CONTACT');
        $mail->addAddress('drys.ferhi@gmail.com');
    
    
        $mail->isHTML(true);                         
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
    } catch (Exception $e) {
        echo "";
    }
  }

inserer_les_emails();

?>


