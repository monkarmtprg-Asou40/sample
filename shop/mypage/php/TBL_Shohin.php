<?php
require_once __DIR__ . "/Shohin.php";
class TBL_Shohin{
    public static function selectShohin($pdo, $search){
        //実行したいSQLを準備する
        $sql = 'SELECT * FROM shohin where name LIKE ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,'%'.$search.'%',PDO::PARAM_STR);
        //SQLを実行
        $stmt->execute();
        //データベースの値を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // $result = $stmt->fetchall();
        $shohin = new Shohin();
        $shohin->shohin_id = $result['shohin_id'];
        $shohin->shohin_name = $result['shohin_name'];
        $shohin->nedan = $result['nedan'];
        $shohin->about = $result['about'];
        $shohin->image = $result['image'];
        return $shohin;
    }
    public static function selectShohins($pdo){
        //実行したいSQLを準備する
        $sql = 'SELECT * FROM shohin_tbl';
        $stmt = $pdo->prepare($sql);
        //SQLを実行
        $stmt->execute();
        //データベースの値を取得
        $results = $stmt->fetchall();
        $shohins = array();
        foreach($results as $result){
            $shohin = new Shohin();
            $shohin->shohin_id = $result['shohin_id'];
            $shohin->shohin_name = $result['shohin_name'];
            $shohin->nedan = $result['nedan'];
            $shohin->about = $result['about'];
	    $shohin->tourokubi = $result['tourokubi'];
	    $shohin->image = $result['image'];
            $shohins[] = $shohin; // リストに追加
        }
        return $shohins;
    }
}
?>