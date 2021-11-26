<?php
session_start();
require_once "../app/models/User.php";
require_once "../app/models/Person.php";

class Home extends Controller
{
    public function homepage(){
        return $this->get_view("home/homepage");
    }
    public function new_account(){
        if(isset($_POST["create-submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $status = $_POST["status"];

            $user = new User($username, $password, $email, $status);
            $user->create_account();
            return header("Location:signin");
        }
        return $this->get_view("home/new_account");
    }
    public function signin(){
        if(isset($_POST["signin-submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user_set = Controller::db_get_verfied_data($username, $password);
            if($user_set){
                $user = new User("{$user_set['username']}", "{$user_set['userpassword']}", "{$user_set['email']}", "{$user_set['status']}");
                $_SESSION["usersignin"] = $user->username;
                $_SESSION["userstatus"] = $user->status;

                date_default_timezone_set("Africa/Cairo");
                $expire = time() + 60*60*24*7;
                setcookie("usernamecookie", null, $expire);
                setcookie("usernamecookie", "{$user->username} On " . date("l jS \of F Y h:i:s A"), $expire);
                
                return header("Location:personal_data");
            }
        }
        return $this->get_view("home/signin");
    }
    public function personal_data($personal_id = ""){
        if(isset($_SESSION["usersignin"])){
            if(isset($_POST["add-submit"])){
                $fullname = $_POST["fullname"];
                $phone = $_POST["phone"];
                $jop = $_POST["jop"];
                $location = $_POST["location"];
    
                $person = new Person($fullname, $phone, $jop, $location);
                $person->save_person();
                return header("Location:personal_data");
            }
            if($personal_id >= 1){
                $result = Controller::db_delete("personal_data", $personal_id);
                if($result){
                    header("Location:personal_data");
                }
            }
            if(isset($_POST["logout-submit"])){
                $_SESSION["usersignin"] = null;
                $_SESSION["userstatus"] = null;
                return header("Location:signin");
            }
            return $this->get_view("home/personal_data");
        }
        return header("Location:../signin");
    }
    
    public function add_person($personal_id = ""){
        if(isset($_SESSION["usersignin"]) || isset($_POST["new-person-submit"])){
            if(!empty($personal_id)){
                $_GET["personal_id"] = $personal_id;
                return $this->get_view("home/add_person");
            }
            return $this->get_view("home/add_person");
        } else {
            if(!empty($personal_id)){
                header("Location:../signin");
            } else {
                header("Location:signin");
            }
        }
    }
    public function edit_person($personal_id){
        if(isset($_SESSION["usersignin"])){
            if(isset($_POST["add-submit"])){
                $fullname = $_POST["fullname"];
                $phone = $_POST["phone"];
                $jop = $_POST["jop"];
                $location = $_POST["location"];
    
                $person = new Person($fullname, $phone, $jop, $location);
                $person->edit_person($personal_id);
                return header("Location:../personal_data");
            }
        } else {
            header("Location:../signin");
        }
    }
}