<?php
class Shares extends ControllerClass{
    protected function Index(){
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Index(),TRUE);
    }
}