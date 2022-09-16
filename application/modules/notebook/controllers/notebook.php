<?php

class Notebook extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($arg = 0)
    {
        $where = array(
            'usersid' => $_SESSION['usersid'],
            'is_delete' => 0
        );

        $data['notebooks'] = $this->model->getRows('*', 'notebook', $where, 'notebookid DESC');

        $data['id'] = $arg;
        $data['content'] = 'notebook/notebook';
        $this->main_template($data);

        // print_r($data['content']);

    }

    function viewnotebook($arg = 0){
        $data['notes'] = $this->model->getRowByQuery('SELECT notebook.title, notebook.notebookid, notes.* FROM notebook LEFT JOIN notes ON notebook.notebookid = notes.notebookid AND notes.is_delete = 0 WHERE notebook.notebookid =' . $arg);
 
        $data['content'] = 'notebook/notes';
        // print_r($data['notes'][0]['title']);
        $this->load->view('notebook/notes', $data);
    }

    function addnotebook(){
        $to_insert = array(
            'title' => $_POST['title'],
            'usersid' => $_SESSION['usersid']
        );

        $this->model->insert("notebook", $to_insert);
        echo "added";
    }

    function editnotebook($arg){
        $to_update = array(
            'title' => $_POST['title']
        );

        $this->model->update("notebook", $to_update, 'notebookid = ' . $arg);
        echo "updated";
    }

    function deletenotebook($arg){
        $to_update = array(
            'is_delete' => 1
        );

        $this->model->update("notebook", $to_update, 'notebookid = ' . $arg);
        echo "updated";
    }

    function deletenote($arg){
        $to_update = array(
            'is_delete' => 1
        );

        $this->model->update("notes", $to_update, 'notesid = ' . $arg);
        echo "updated";
    }

    function addnotes($arg){
        $to_insert = array(
            'content' => $_POST['content'],
            'notebookid' => $arg,
            'usersid' => $_SESSION['usersid']
        );

        $this->model->insert("notes", $to_insert);
        echo "added";
    }

    function notes($arg){

        $data['notes'] = $this->model->getRowByQuery('SELECT notes.*, notebook.title FROM notes JOIN notebook ON notebook.notebookid = notes.notebookid WHERE notes.notebookid='.$arg);
 
        $data['content'] = 'notebook/notes';
        $this->main_template($data);
    }

    function modaladdnotebook(){
        $this->load->view('notebook/modal_addnotebook');
    }

    function modaladdnotes($arg){
        $data['notebookid'] = $arg;

        $this->load->view('notebook/modal_addnote', $data);
    }

    function modaleditnotebook($arg = ""){
        $data = $this->model->getRow('*', 'notebook', 'notebookid = '.$arg);

        $this->load->view('notebook/modal_editnotebook', $data);
    }

    function modalviewnotebook($arg){
        $data = $this->model->getRow('*', 'notebook', 'notebookid = '.$arg);

        $this->load->view('notebook/modal_editnotebook', $data);
    }

    function modal_notebook($arg){
        $data = $arg;

        $this->load->view('notebook/modal_notebook', $data);
    }

    function viewnote(){
        $this->load->view('notebook/modal_notebook/');
    }

    function test(){
        // $data = $this->model->getRow('*', 'notebook');

        $data['firsttable'] = $this->model->getRowByQuery('SELECT * FROM notebook', 'row');
        $data['secondtable'] = $this->model->getRowByQuery('SELECT * FROM notes', 'row');
        

        if(!empty($data)){
            print_r($data);
        }
        else{
            echo 'database is empty!';
        }
    }
}
