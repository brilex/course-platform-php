<?php 

function show($stuff) {
    echo " <pre>";
        print_r($stuff);
     echo " </pre>";
}

class App {
    protected $controller = '_404';
    protected $method = 'index';
    function __construct()
    {
       $arr = $this->getURL();
       $filename = "../app/controlers/" .ucfirst($arr[0]).".php";
       if(file_exists($filename)) {
            require $filename;
            $this->controller = $arr[0];
            unset($arr[0]);
       } else {
            require "../app/controlers/" .$this->controller.".php";
       }
      
       $mycontroller = new $this->controller();
       $mymethod = $arr[1] ?? $this->method;

       if(method_exists($mycontroller, strtolower($mymethod))){
            $this->method = strtolower($mymethod);
       }

       call_user_func( [$mycontroller, $this->method],$arr);

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
