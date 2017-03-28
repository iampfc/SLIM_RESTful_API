<?php
/**
 * Created by PhpStorm.
 * User: wing
 * Date: 17/3/19
 * Time: 上午1:45
 */

class control{
    protected $container;
    protected $db;
    public $errors;

    // constructor receives container instance
    public function __construct($container) {
////        $this->container = $container;
        require '../config/error.php';
        $this->errors = $errors;
        $pdo = new PDO('mysql:host=localhost;dbname=app', "root", "wing-root");
        $pdo->exec("SET NAMES 'utf8'");
        $this->db = new NotORM($pdo);
    }

    public function success($content = '',$message = '请求成功')
    {
        $data = array('code'=>0);
        $data['message'] = $message;
        $data['content'] = $content;
        return json_encode($data);
    }

    public function error($key,$params = array(),$resetCode = null){
        $error =  $this->errors->{$key};
        if($key == 'vaildFail'){
            $error['validation'] = $params;
        }elseif(count($params) > 0){
            $error['message'] = sprintf($error['message'],...$params); //php5.6+
        }

        if($resetCode != null){
            $error['code'] = $resetCode;
        }
        return json_encode($error);
    }
}