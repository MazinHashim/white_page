<?php
define("HOST", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DB_NAME", "white_pages_db");

class Controller
{
    public function get_model($model)
    {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }
    public function get_view($view, $data = []){
        require_once "../app/views/" . $view . ".php";
    }

    public static function db_connection(){
        $connection = mysqli_connect(HOST, USER_NAME, PASSWORD, DB_NAME);

        if(mysqli_connect_errno()){
        die("Database Connection Failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"
            );
        }
        return $connection;
    }
    public static function db_close($connection){
        if (isset($connection)){
            mysqli_close($connection);
        }
    }
    public static function db_insert($table, $val1, $val2, $val3, $val4){
        $connection = Controller::db_connection();
        $query = "INSERT INTO $table VALUES ('$val1','$val2','$val3','$val4')";
        $result = mysqli_query($connection, $query);
        if( $result ){
            $message = "Now You Are Registered. Thank you!";
        } else {
            $error = "There Some Errors";
        }
        Controller::db_close($connection);
        return $result;
    }
    public static function db_update($id, $val1, $val2, $val3, $val4){
        $connection = Controller::db_connection();
        $query = "UPDATE personal_data SET  fullname='$val1',phone='$val2',jop='$val3',location='$val4' WHERE personal_id=$id";
        $result = mysqli_query($connection, $query);
        if( $result ){
            $message = "Udated Successfully. Thank you!";
        } else {
            $error = "There Some Errors";
        }
        Controller::db_close($connection);
        return $result;
    }
    public static function db_delete($table, $id){
        $connection = Controller::db_connection();
        $query = "DELETE FROM $table WHERE personal_id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        return $result;
        Controller::db_close($connection);
    }
    public static function db_get_verfied_data($username, $password){
        $connection = Controller::db_connection();
        $query = "SELECT * FROM administrator WHERE username='$username' && userpassword='$password'";
        $result = mysqli_query($connection, $query);
        if( $user = mysqli_fetch_assoc($result) ){
            return $user;
        }
        Controller::db_close($connection);
    }
    public static function db_get_persons_data(){
        $connection = Controller::db_connection();
        $query = "SELECT * FROM personal_data ORDER BY fullname";
        $result = mysqli_query($connection, $query);
        return $result;
        Controller::db_close($connection);
    }
    public static function db_search_persons_data($name){
        $connection = Controller::db_connection();
        $query = "SELECT * FROM personal_data WHERE fullname LIKE '$name%' ORDER BY fullname";
        $result = mysqli_query($connection, $query);
        return $result;
        Controller::db_close($connection);
    }
    public static function db_get_person($id){
        $connection = Controller::db_connection();
        $query = "SELECT * FROM personal_data WHERE personal_id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        return $result;
        Controller::db_close($connection);
    }
}
