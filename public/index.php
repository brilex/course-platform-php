<?php 

class App {
    protected $controller = '_404';
    function __construct()
    {
       $arr = $this->getURL();
       $filename = "../app/controlers/" .ucfirst($arr[0]).".php";
       if(file_exists($filename)) {
            require $filename;
            $this->controller = $arr[0];
       } else {
            require "../app/controlers/" .$this->controller.".php";
       }
       $mycontroller = new $this->controller();

    }
    private function getURL()
    {
        $url = $_GET['url'] ?? 'home';
        $url = preg_replace('/[^a-zA-Z0-9\/_-]/', '', $url);
        $arr = explode("/", $url);
        return  $arr;
    }
}

$app = new App();
