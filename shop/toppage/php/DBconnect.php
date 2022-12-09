<?php
require_once __DIR__ . "/Shohin.php";
class DBconnect{
    public static function connect_db(){
    //ホスト名、データベース名、文字コードの３つを定義する
    $host = 'mysql207.phy.lolipop.lan';
    $db = 'LAA1417874-mentaizu';
    $charset = 'utf8';
    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    //ユーザー名、パスワード
    $user = 'LAA1417874';
    $pass = 'mentaizu';

    try{
        //上のデータを引数に入れて、PDOインスタンスを作成
        $pdo = new PDO($dsn, $user, $pass);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    //PDOインスタンスを返す
    return $pdo;
    }
}
?>