<?php

require_once 'block_io-php/lib/block_io.php';
include_once 'classes/Session.php';
include_once 'classes/Handler.php';
$apiKey=Session::getApiKey();//API Key
$pin=Session::getPin();//Pin
$version = 2; // API version

$handler=new Handler($apiKey, $pin, $version);
if(Session::isLoggedIn()) {

    ?>
<?php include 'login.php';  ?>
    <head>
        <meta http-equiv="Content-Type" content="text/css; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TEST_BlockIO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <div align="center">
        <div>
            <form method="POST" class= "form-inline">
                <p>SEND BT:</p>
                <div class="form-group">
                AMMOUNTS:<p><input class="form-control" type="text" name="ammounts" ></p>
                FROM ADDRESS:<p><input class="form-control" type="text" name="fromAddress"></p>
                TO ADDRESS:<p><input class="form-control" type="text" name="toAddress" ></p>


                <input class="btn btn-default" type="submit" name="submit_sendBT" value="Send BT">
                <input class="btn btn-default"  type="submit" name="submit_home" value="Home">
            </form>
            <?php
            if (isset($_POST["submit_sendBT"])) {
                if (!empty($_POST['ammounts']) && !empty($_POST['ammounts']) && !empty($_POST['fromAddress']) && !empty($_POST['toAddress'])) {
                    $handler->sendBT($_POST['ammounts'], $_POST['fromAddress'], $_POST['toAddress'], Session::getPin());

                } else {
                    echo "Field is not filled";
                }
            }
            if(isset($_POST['submit_home'])){
                header ('Location: main.php');
            }
            ?>
        </div>


    </div>

    <?php
}
?>
