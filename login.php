<?php
include_once "classes/Session.php";
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    Session::login($_POST['login'], $_POST['password']);
    if (empty($_SESSION['apiKey'])) {
        Session::getNetwork(Session::BITCOINTESTNET);
    }
}
if (Session::isLoggedIn() && isset($_GET['logout']))
    Session::logOut();


?>

<?php
if (!Session::isLoggedIn()) {
    ?>
   <form class= "form-inline" method="POST" action="main.php">
<div align="center">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" placeholder="rjabkovvladimir@gmail.com" name="login">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" placeholder="53543770Samsung" name="password">
        </div>
        <button type="submit" class="btn btn-default">Enter</button>
        </div>
    </form>




<?php } else {
    ?>

    <button class="btn btn-default" id="logout" onclick='window.location="main.php?logout"'>log out</button>

<?php } ?>
