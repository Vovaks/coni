<?php
session_start();
include_once "MySQL.php";


class Session
{
    const BITCOINTESTNET = "BitcoinTESTNET";
    const LITECOINTESTNET = "LitecoinTESTNET";
    const DOGECOINTESTNET = "DogecoinTESTNET";
    const BITCOIN = "Bitcoin";
    const LITECOIN = "Litecoin";
    const DOGECOIN = "Dogecoin";

    /**
     * @return int
     */
    public static function isLoggedIn()
    {
        if (!empty($_SESSION['isLoggedIn']))
            return $_SESSION['isLoggedIn'];
        else return 0;
    }

    /**GetPin
     * @return int
     */
    public static function getPin()
    {
        if (!empty($_SESSION['pin']))
            return $_SESSION['pin'];
        else return 0;
    }

    /**GetApiKey
     * @return int
     */
    public static function getApiKey()
    {
        if (!empty($_SESSION['apiKey']))
            return $_SESSION['apiKey'];
        else return 0;
    }


    /**Get Coins name
     * @param $coin string
     */
    public static function getNetwork($coin)
    {

        if (!empty($_SESSION['login']) && !empty($_SESSION['password'])) {
            $query = MySql::networkCoins($_SESSION['login'], $_SESSION['password'], $coin);

            $_SESSION['apiKey'] = $query;//Key
        }
    }

    /**
     * @param $login string
     * @param $password string
     */
    public static function login($login, $password)
    {

        if (MySQL::isUser($login, $password)) {


             echo "Login is successful";

            $table = "users";
            $user = MySql::resultArray($login, $password, $table);
            $user = $user[0];

            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['pin'] = $user[3];
            $_SESSION['isLoggedIn'] = true;

        } else {
            echo"Invalid username or password";
            $_SESSION['userId'] = "";
            $_SESSION['userLogin'] = "";
            $_SESSION['isLoggedIn'] = false;
            $_SESSION['apiKey'] = "";

        }
    }

    /**
     * LOGOUT
     */
    public static function logOut()
    {

        $_SESSION['userId'] = "";
        $_SESSION['userLogin'] = "";
        $_SESSION['isLoggedIn'] = 0;
        $_SESSION['apiKey'] = "";

    }
}

?>
