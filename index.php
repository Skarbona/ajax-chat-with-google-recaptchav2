<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX FORM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">Ajax Form in PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5 pt-5">
    <div class="card card-body mt-5 mb-3">
        <h4 class="card-title display-4" >Ajax Chat</h4>
        <p class="card-text"></p>
        <div class="bg-light p-3 mb-3" id="chat_box">
            <div id="chat_refresh">



                <?php require_once 'Messages.php';

                $messages = new Messages;
                $message = $messages->showMessages();


                ?>
                <?php foreach($message['chat'] as $message) : ?>


                    <div class="alert alert-info"><span style="font-weight:700;"><?php echo $message->name ?>:</span>
                        <span><?php echo $message->message ?></span>
                        <span style="float:right;color:#333;"><?php echo $message->data ?></span>
                    </div>

                <p>  </p>

                <?php endforeach; ?>
            </div>

        </div>
        <form method="post" action="ajax.php">
            <div class="form-group">
            <input id="name" type="text" name="name" placeholder="Enter Your Name" class="form-control form-control-lg">
            </div>
            <div class="form-group">
            <textarea id="message" name="message" placeholder="Enter Your Message" class="form-control form-control-lg"></textarea>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeXFk0UAAAAAH32GGzWTAoGVr5z6KWmn_ljwFqY"></div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Send Message" class="btn btn-success btn-lg">
            </div>

            <div class="form-group">
                <div id="messageForm" class="alert"></div>
            </div>

        </form>



    </div>


</div>






<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>