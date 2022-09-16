<?php

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($_SESSION['usersid'] == NULL) {
            redirect(base_url('account'));
        }
        $data['content'] = 'home/index';
        $this->main_template($data);
    }

    function newtask()
    {
        if (!IS_AJAX) show_404();

        if ($_POST['todoid'] != '') {
            $to_update = array(
                'todotask' => $_POST['todotask'],
                'duedate' => $_POST['todoenddate'],
                'startdate' => $_POST['todostartdate'],
                'status' => $_POST['todostatus']
            );

            if ($this->model->update("todos", $to_update, 'todoid = ' . $_POST['todoid'])) {
                echo "editted";
            } else {
                echo "error";
            }
        } else {
            $to_insert = array(
                'todotask' => $_POST['todotask'],
                'duedate' => $_POST['todoenddate'],
                'startdate' => $_POST['todostartdate'],
                'usersid' => $_SESSION['usersid']
            );

            $this->model->insert("todos", $to_insert);
            echo "added";
        }
    }

    function showtodos()
    {
        if (isset($_POST['show'])) {
            echo json_encode($this->model->getRows('*', 'todos', 'usersid = ' . $_SESSION['usersid'] . ' AND is_delete = 1'));
        } else {
            echo json_encode($this->model->getRows('*', 'todos', 'usersid = ' . $_SESSION['usersid'] . ' AND is_delete = 0'));
        }
    }

    function delete($arg)
    {
        $to_update = array(
            'is_delete' => 1
        );

        if ($this->model->update("todos", $to_update, 'todoid = ' . $arg)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function retrieve($arg)
    {
        $to_update = array(
            'is_delete' => 0
        );

        if ($this->model->update("todos", $to_update, 'todoid = ' . $arg)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function fetchdata($id)
    {
        $query = $this->db->query("SELECT * FROM todos WHERE todoid=$id");

        $row = $query->row();

        echo json_encode($row);
    }
}
