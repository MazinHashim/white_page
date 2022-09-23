<?php
class Person
{
    private $id;
    private $fullname;
    private $phone;
    private $jop;
    private $location;

    public function __construct($fullname, $phone, $jop, $location){

        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->jop = $jop;
        $this->location = $location;

    }

    public function __set($key, $value){
        switch ($key) {
            case 'id':
                $this->id = $value;
            break;
            case 'fullname':
                $this->fullname = $value;
            break;
            case 'phone':
                $this->phone = $value;
            break;
            case 'jop':
                $this->jop = $value;
            break;
            case 'location':
                $this->location = $value;
            break;
        }
        return $value;
    }
    public function __get($key){
        switch ($key) {
            case 'id':
                return $this->id;
            case 'fullname':
                return $this->fullname;
            case 'phone':
                return $this->phone;
            case 'jop':
                return $this->jop;
            case 'location':
                return $this->location;
        }
    }
    public function save_person(){        
        return Controller::db_insert("personal_data (fullname,phone,jop,location)", $this->fullname,$this->phone,$this->jop, $this->location);
    }
    public function edit_person($id){        
        return Controller::db_update($id, $this->fullname,$this->phone,$this->jop, $this->location);
    }
    
}