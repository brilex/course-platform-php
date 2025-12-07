<?php 

class Home {
    public function index()
    {
       echo "Home page";
    }
     public function edit()
    {
       echo "Home page editing";
    }
     public function delete($id)
    {
       echo "Deleting the Home page ".$id;
    }
}