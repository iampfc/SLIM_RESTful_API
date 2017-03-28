<?php
$errors = new stdClass();
//insert update delete faile 6xx
$errors->createFail = array('message'=>'创建失败','code'=>6001);
$errors->updateFail = array('message'=>'更新失败','code'=>6002);
$errors->deleteFail = array('message'=>'删除失败','code'=>6003);
$errors->submitFail = array('message'=>'提交失败','code'=>6004);
$errors->selectFail = array('message'=>'未查询到相关内容','code'=>6004);