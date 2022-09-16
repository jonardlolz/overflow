<?php

class Sample extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['content'] = 'sample/index';
        $this->main_template($data);
    }
}
