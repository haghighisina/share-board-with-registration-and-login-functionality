<?php /* @noinspection ALL */
abstract class Controller{

    public function __construct(protected $action, protected $request){}

    public function executeAction(){
       return $this->{$this->action}();
    }

    protected function returnView($viewModel, $fullView){
        $view = "views/" . get_class($this). "/" .$this->action. ".php";
        if ($fullView){
            require "views/main.php";
        }else{
            require $view;
        }
    }
}