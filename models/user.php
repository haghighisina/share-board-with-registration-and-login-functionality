<?php
class UserModel extends Model {
    public function register() {
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $error = [];
        if (isset($input['submit'])) {
            $password = password_hash($input['password'], PASSWORD_BCRYPT);
            if (isset($input['email']) && empty($input['email'])) {
                $error[] = 'email empty';
            }
            if (isset($input['name']) && empty($input['name'])) {
                $error[] = 'email empty';
            }
            if (isset($input['password']) && empty($input['password'])) {
                $error[] = 'email empty';
            }

            $this->query("INSERT INTO users SET  
             name= :name,
             email= :email,
             password= :password ");
            $this->bindParameters(":email", $input['email']);
            $this->bindParameters(":password", $password);
            $this->bindParameters(":name", $input['name']);
            $this->QueryExecute();
            if (!empty($error)){
                $_SESSION['error'] = $error;
                header("location: " . ROOT_URL . "users/register");
                exit();
            }elseif ($this->lastInsertId()) {
                $_SESSION['success'][] = " you have successfully registered in";
                header("location: " . ROOT_URL . "users/login");
                exit();
            }
        }
    }

    public function login() {
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $errors = [];
        //get the password from database
        if (isset($input['submit'])) {
            $userData = $this->userData($input['name']);
            if (isset($input['name']) && empty($input['name'])) {
                $errors[] = "name empty";
            }
            if (true === (bool)$input['name'] && $input['name'] !== $userData[0]['name']){
                $errors[]= "username not exist";
            }
            if (isset($input['email']) && empty($input['email'])) {
                $errors[] = "email empty";
            }
            if (isset($input['password']) && empty($input['password'])) {
                $errors[] = "password empty";
            }
            if (true === (bool)$input['password'] && isset($userData[0]['password']) &&
                false === password_verify($input['password'], $userData[0]['password'])) {
                $errors[] = "Password is not right";
            }
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                header("location: " . ROOT_URL . "users/login");
                exit();
            }
            if (empty($errors)) {
                $_SESSION['success'][] = " you have successfully logged in";
                header("location: " . ROOT_URL);
                exit();
            }

        }
    }

}