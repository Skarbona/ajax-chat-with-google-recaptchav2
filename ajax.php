<?php require_once 'Messages.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {


    // getting the captcha
    $captcha = "";
    if (isset($_POST["g-recaptcha-response"])) {  $captcha = $_POST["g-recaptcha-response"]; }

    if (!$captcha) {
      echo 'Captcha empty';

        exit;
    }


    $secret = "_ADD_YOUR_SECRET_KEY_"; //remember to add recaptcha key in index.html
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);





    // if the captcha is cleared with google, send the mail and echo ok.
    if ($response["success"] != false) {

        // assemble the message from the POST fields
        $name       =   strip_tags(trim($_POST['name']));
        $message    =   trim($_POST['message']);

        if(empty($name) || empty($message)) {

            echo 'Something go wrong, try again';
            exit;

        } else {



            $data =[
                'name'     => trim($_POST['name']),
                'message'      => trim($_POST['message']),

            ];

            $messagesNew    = new Messages;
            $messageNew     = $messagesNew->addMessage($data);

            echo 'You send a message';


        }
    } //CHECK CAPTCHA
    else {

    echo 'Something go wrong';
    exit;

    }
} //End of POST










?>
























