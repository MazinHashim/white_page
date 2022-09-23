<?php
class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $status;

    public function __construct($username, $password, $email, $status){

        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->status = $status;

    }

    public function __set($key, $value){
        switch ($key) {
            case 'id':
                $this->id = $value;
            break;
            case 'username':
                $this->username = $value;
            break;
            case 'password':
                $this->password = $value;
            break;
            case 'email':
                $this->email = $value;
            break;
            case 'status':
                $this->status = $value;
            break;
        }
        return $value;
    }
    public function __get($key){
        switch ($key) {
            case 'id':
                return $this->id;
            case 'username':
                return $this->username;
            case 'password':
                return $this->password;
            case 'email':
                return $this->email;
            case 'status':
                return $this->status;
        }
    }

    public function create_account(){        
        return Controller::db_insert("administrator (username,userpassword,email,status)", $this->username,$this->password,$this->email, $this->status);
    }
}