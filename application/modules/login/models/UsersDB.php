<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersDB extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($username)
    {
        $query = $this->db->select("*")->from("users")->where("username", $username)->get()->first_row();
        return $query;
    }
}
