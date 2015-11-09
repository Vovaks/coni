<?php

/*
Autor:  Vladimir Rjabkov
 Date: 05.11.2015
 Time: 10:40
 */

require_once 'classes/Handler.php';
include_once 'classes/Session.php';


if (isset($_POST['btn_sendBT'])) {//Send BT
    header('Location: sendBT.php');
}
if (isset($_POST['coin'])) {
    Session::getNetwork(($_POST['coin']));

}

?>

<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/css; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEST_BlockIO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<header id="header">
    <div id="top_right">
        <?php include 'login.php';

        $apiKey = Session::getApiKey();//API Key
        $pin = Session::getPin();//Pin

        $handler = new Handler($apiKey, $pin);
        if (Session::isLoggedIn()) {

            if (isset($_POST['btn_newAddress'])) {//Create new address if button active
                $handler->setAddress();

            }


        }

        ?>
    </div>
    <div>
        <div style="text-align: center">
            <h2> <?php
                if (Session::isLoggedIn()){
                echo $handler->getBalance();//get ballance
                ?>
                BT<br>
                <small>Balance</small>
            </h2>
            <form method='POST'><p><input class="btn btn-default" type='submit' name='btn_sendBT' value='sendBT'/></p>

                    <?php $handler->coin_selector();
                    } ?>
            </form>
        </div>


        <?php
        if (Session::isLoggedIn()) {

            ?>
            <div align=center>
                <form method="POST" name="newaddress"><label>Enter new address</label>
                    <input type="text" size="25" name="input_newAddress" id="input_newAddress"/>
                    <input class="btn btn-default" width="" type="submit" name="btn_newAddress" value="Create a new address"/>
                </form>

            </div>

        <?php } ?>
        <div align="center">
            <?php
            if (Session::isLoggedIn()) {
                $handler->getAddressed();
            }
            ?>
        </div>


    </div>

</body>
</html>
