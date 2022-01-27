<?php
class Bootstrap{
    private $controller;
    private $action;

    public function __construct(private $request){
        if ($this->request["controller"] == ""){
            $this->controller = "home";
        }else {
            $this->controller = $this->request["controller"];
        }
        if ($this->request["action"] == ""){
            $this->action = "index";
        }else{
            $this->action = $this->request["action"];
        }
    }

    public function createController(){
        //check for Class if exist
        if (class_exists($this->controller)){
            $parents = class_parents($this->controller);
            if (in_array("ControllerClass", $parents)){
                if (method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                }else{//Method does not exist
                    return print("Method does not exist");
                }
            }else{ // Base Controller not found
                 return print("Base Controller not found");
            }
        }else{ // Controller class does not exist
            return print("Controller class does not exist");
        }
    }
}