<?php


class Admin
{
    public function __construct()
    {
    }

    public function isAdmin()
    {
        if (isset($_SESSION['admin'])) {
            return true;
        }
        return false;
    }

}