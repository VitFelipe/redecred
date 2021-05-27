<?php namespace BD{
class Conection {

    const USERNAME=" u498196012_redecred";
    const PASSWORD="@D5+Z~woBY;a";
   //const PASSWORD="";
    //const USERNAME="root";
    const HOST="localhost";
    const DB=" u498196012_redecred";
    //const DB="id1312151_mydb";


  static  function getConnection(){

    date_default_timezone_set("America/Sao_Paulo");
    setlocale(LC_ALL, 'pt_BR');


        $username = Conection::USERNAME;
        $password = Conection::PASSWORD;
        $host = Conection::HOST;
        $db = Conection::DB;
        $connection = new \PDO("mysql:dbname=$db;host=$host", $username, $password);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $connection;
    }


  


}

}

?>