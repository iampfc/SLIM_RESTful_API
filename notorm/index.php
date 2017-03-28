<?php
include "NotORM.php";
$connection = new PDO('mysql:host=localhost;dbname=app', "root", "wing-root");
$connection->exec("SET NAMES 'utf8'");
$software = new NotORM($connection);

foreach ($software->test() as $application) { // get all applications
    echo "$application[name]".'<br>'; // print application title
}

//$where= array('name'=>'123');
//$applications = $software->test()
//    ->select("id, name")
//    ->where($where)
//    ->order("name")
//    ->limit(10) // 或者 ->limit(10,2)，意思就是从结果集的第三行（起始行号为0）开始取10条记录
//;
//foreach ($applications as $id => $application) {
//    echo "$application[name]\n";
//}