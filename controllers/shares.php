<?php
class Shares extends Controller {
    protected function Index(){
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Index(),TRUE);
    }
    protected function Add(){
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Add(),TRUE);
    }
    protected function Delete(){
        $viewModel = new ShareModel();
        $this->returnView($viewModel->Delete(),TRUE);
   }
}