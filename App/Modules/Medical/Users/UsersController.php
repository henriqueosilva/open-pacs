<?php

declare(strict_types = 1);

namespace App\Medical\Users;

use App\Medical\Users\UserClass;

class UsersController
{
    /**
     * All functions must return array with 'http_code'=> '200|404|403' 'status' => 'success|fail'
     * Optional args are 'description|data|'
     */
    public function get(array $query=null){
        var_dump($query);

        return array('http_code' => 200, 'status' => 'success');
        //TODO
    }
    public function post(){
        echo "post";
        //TODO
    }
    public function update(){
        echo "update";
        //TODO
    }
    public function delete(){
        echo "delete";
        //TODO
    }
}