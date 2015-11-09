<?php

class MySql
{
    //connect MySql, parametrs
    private static $server = "localhost";
    private static $login = "root";
    private static $password = "";
    private static $db = "dbblockio";

    /**Connect MySql
     * @return mysqli string
     */
    public static function connect()
    {
        $link = mysqli_connect(MySql::$server, MySql::$login, MySql::$password, MySql::$db);

        if (!$link) {
            die('Connect error: ' . mysqli_error());

        }
        $db_selected = mysqli_select_db($link, MySql::$db);
        if (!$db_selected) {
            die ('don`t select data: ' . mysqli_error());

        }

        mysqli_query($link, "set Name UTF8");


        return $link;
    }

    /**
     * User controll
     * @param string $login login
     * @param $password string password
     * @return int
     */
    public static function isUser($login, $password)
    {
        $link = MySql::connect();


        $query = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'",
            mysqli_real_escape_string($link, trim($login)),
            mysqli_real_escape_string($link, trim($password)));


        $result = mysqli_query($link, $query);


        return mysqli_num_rows($result);

    }

    /**
     * @param $login string
     * @param $password string
     * @return array|null
     */
    public static function resultArray($login, $password, $table)
    {
        $link = MySql::connect();
        $resultArray = null;

        mysqli_query($link, "SET character_set_results = 'utf8'");
        $query = sprintf("SELECT * FROM $table WHERE Email='%s' AND Password='%s'",
            mysqli_real_escape_string($link, trim($login)),
            mysqli_real_escape_string($link, trim($password)));

        $result = mysqli_query($link, $query);


        while ($row = mysqli_fetch_array($result)) {
            $resultArray[] = $row;
        }

        return $resultArray;

    }

    /** Get Api Key
     * @param $login string
     * @param $password string
     * @param $coin string
     * @return bool|mysqli_result
     */
    public static function networkCoins($login, $password, $coin)
    {
        $link = MySql::connect();

        $resultArray = null;

        mysqli_query($link, "SET character_set_results = 'utf8'");
        $query = sprintf("SELECT coins.%s as apikey FROM coins,users WHERE users.Email='%s' AND users.Password='%s'",
            mysqli_real_escape_string($link, trim($coin)),
            mysqli_real_escape_string($link, trim($login)),
            mysqli_real_escape_string($link, trim($password)));

        $result = mysqli_query($link, $query);


        $row = mysqli_fetch_array($result);

        $result = $row['apikey'];


        return $result;

    }
}

?>