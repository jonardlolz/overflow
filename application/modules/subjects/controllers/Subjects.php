<?php

class Subjects extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['content'] = 'subjects/index';
        $this->main_template($data);
    }

    function english($val = '')
    {
        $data['val'] = $val;
        $data['content'] = 'subjects/english';
        $this->main_template($data);
    }

    function math($val = '')
    {
        $data['val'] = $val;
        $data['content'] = 'subjects/math';
        $this->main_template($data);
    }
}
