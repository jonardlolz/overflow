<?php

class Test extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['content'] = 'test/index';
        $this->main_template($data);
    }
}
