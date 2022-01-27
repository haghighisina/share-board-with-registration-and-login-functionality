<?php
class Home extends ControllerClass{
    protected function Index(){
        $viewModel = new HomeModel();
        $this->returnView($viewModel->Index(),TRUE);
    }
}