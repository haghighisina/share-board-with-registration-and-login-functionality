<?php
class Users extends Controller{
    protected function register(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }
    protected function login(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }

    protected function logout(){
        session_destroy();
        session_write_close();
        setcookie('user_data','user_data',strtotime('-30 days'),'/');
        setcookie('user_id','user_id',strtotime('-30 days'),'/');
        header("location: " .ROOT_URL);
        exit();
    }
}