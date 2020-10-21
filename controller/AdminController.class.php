<?php
class AdminController extends Controller
{
    public $view = 'admin';
    public $title = 'Админка';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
     return "ok";
    }

}