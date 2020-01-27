<?php


class HomeController
{
    public function index()
    {
        ViewManager::view('home');
    }

    public function test($number)
    {
        var_dump($number);
    }
}
