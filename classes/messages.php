<?php
class Message{
    public static function setMsg($text, $type){
        if ($type === "error"){
            $_SESSION['errorMsg'] = $text;
        }else{
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display(){
        if (isset($_SESSION['errorMsg']) && !empty($_SESSION['errorMsg'])){
            foreach($_SESSION['errorMsg'] as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
                unset($_SESSION['errorMsg']);
            }
        }
        if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])){
            foreach ($_SESSION['successMsg'] as $success) {
                echo '<div class="alert alert-success">' . $success . '</div>';
                unset($_SESSION['successMsg']);
            }
        }
    }
}