<?php

class Users extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        

        $data['list'] = $this->model->getRows("*", "users");
        $data['content'] = 'users/index';
        $this->main_template($data);
    }

    function insert(){
        if ($_POST) {
            $to_insert = array(
                'email' => $_POST['Email'],
                'password' => $_POST['Password'],
                'firstname' => $_POST['Firstname'],
                'lastname' => $_POST['Lastname'],
            );

            $this->model->insert("users", $to_insert);
            redirect('users/');
        }
    }
}
