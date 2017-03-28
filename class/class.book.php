<?php
/**
 * Created by PhpStorm.
 * User: wing
 * Date: 17/3/19
 * Time: 下午10:02
 */
require 'control.php';

/************* RESETful API Book ***********/
$this->slim->get("/book/getByID/{id}",\BookController::class . ':getByID');
$this->slim->post("/book/create",\BookController::class . ':create');

class BookController extends control
{
    public function getByID($request, $response, $args)
    {
        $id = $args['id'];
        echo json_encode(array(
            "id" => $id,
        ));
    }

    public function create()
    {
        echo 'create';exit;
    }
}