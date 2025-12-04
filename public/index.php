<?php 

class app {
    function __construct()
    {
       print_r($this->getURL());
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
