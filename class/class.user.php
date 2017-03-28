<?php
/**
 * Created by PhpStorm.
 * User: wing
 * Date: 17/3/19
 * Time: 上午1:25
 */

require 'control.php';

/************* RESETful API User ***********/
$this->slim->get("/user/getByID/{id}",'\UserController:getByID');
$this->slim->get("/user/getList/[{pid}[/{psize}]]",'\UserController:getList');
$this->slim->post("/user/create",'\UserController:create');
$this->slim->put("/user/update",'\UserController:update');
$this->slim->delete("/user/delete",'\UserController:delete');

class UserController extends control{

    public function getByID($request, $response, $args)
    {
        $id = $args['id'];
        $user = $this->db->user()
            ->select('id,name,age,gender')
            ->where("id", $id)
            ->fetch();
        if ($user) {
            $data = array(
                "id"      => $user["id"],
                "name"    => $user["name"],
                "age"     => $user["age"],
                "gender"  => $user["gender"],
            );
            return $this->success($data);
        } else{
            return $this->error('selectFail');
        }
    }

    public function getList($request, $response, $args)
    {
        $pid = $args['pid'] ? $args['pid'] : 0;
        $psize = $args['psize'] ? $args['psize'] : 10;
        $user = $this->db->user()
            ->select('id,name,age,gender')
            ->limit($psize,$pid)
            ->fetchAll();
        $data = array();
        if ($user)
        {
            foreach ($user as $key => $value)
            {
                $data[$key]['id']     = $value['id'];
                $data[$key]['name']   = $value['name'];
                $data[$key]['age']    = $value['age'];
                $data[$key]['gender'] = $value['gender'];
            }
        }
        return $this->success($data);
    }

    public function create($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $result = $this->db->user()->insert($data);
        if(!$result)
        {
            return $this->error('createFail');
        } else {
            return $this->success();
        }
    }

    public function update($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $result = $this->db->user()
            ->select("id")
            ->where('id',$data['id'])
            ->update($data);
        if(!$result)
        {
            return $this->error('updateFail');
        } else {
            return $this->success();
        }
    }

    public function delete($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $result = $this->db->user()
            ->select("id")
            ->where('id',$data['id'])
            ->delete();
        var_dump($result);
    }

}


