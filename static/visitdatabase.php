<?php

//请求数据库数据并验证账号密码


$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'juyiqi', 
    'db_user' => 'root', 
    'db_pwd'  => '', 
    );

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
}
$mysqli->query("set names 'utf8';");//编码转化
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  $mysqli->error);
}$sql = $_POST["sql"];
// "select * from user where id = 1";
// "select * from user where id = " . $_POST["name"]
$res = $mysqli->query($sql);
if (!$res) {
    die("sql error:\n" . $mysqli->error);
}
$result = array();
$results = array();


while($row = $res->fetch_assoc()) {
        // $result = var_dump($row);
    // $result[] = json_encode($row);
    $result[] = $row;
}

// while($row = $res->fetch_object()){
//     //每一组返回结果，加入到数组中
//     $results[] = json_encode($row);   
//     // $results[] = $row; 
// }
//将数组转化为json格式输出
echo $r = json_encode($result);    
// echo $results;
// echo $results;


$res->free();
$mysqli->close();


?>