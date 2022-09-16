<?php

class Account extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        session_destroy();
        $data['content'] = 'account/login';
        // $this->main_template($data);
        $this->load->view('login');
    }

    function login()
    {
        session_destroy();
        $data['content'] = 'account/login';
        // $this->main_template($data);
        $this->load->view('login');
    }

    function register()
    {
        $data['content'] = 'account/register';
        // $this->main_template($data);
        $this->load->view('register');
    }

    function edit()
    {
        $test = "test";

        echo $test;
    }

    function accountlogin()
    {
        $query = $this->db->query("SELECT * FROM users WHERE email='{$_POST['email']}' LIMIT 1");

        if ($query->num_rows()) {
            $row = $query->row();
        
            if (password_verify($_POST['password'], $row->password)) {

                $_SESSION['usersid'] = $row->usersid;
                $_SESSION['email'] = $row->email;
                $_SESSION['firstname'] = $row->firstname;
                $_SESSION['lastname'] = $row->lastname;
                // $this->session->set_userdata((array)$row);

                $response = array(
                    'success' => true,
                );
            } else {
                $response = array(
                    'success' => false,
                );
            }
        } else {
            $response = array(
                'error' => 'error',
            );
        }

        echo json_encode($response);
    }

    function registercreate()
    {
        if ($_POST) {
            $data['data'] = $this->model->count_rows("SELECT * FROM users WHERE email='{$_POST['email']}'");

            if ($data['data'] == 0) {
                $to_insert = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

                );

                $this->model->insert("users", $to_insert);
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo 'error test';
        }
    }
}
