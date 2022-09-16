<?php

class MY_Controller extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('MY_Model', 'model');

        $this->_path    = $_SERVER['DOCUMENT_ROOT'] . '/';
        
    }

    function main_template($data = NULL)
    {
        $this->load->view('template_main', $data);
    }


    // basic pagination [START]
    public function page($segment)
    {
        return ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
    }

    public function basic_pagination($rows, $page, $segment = 3)
    {
        $config = array();

        $config['base_url']           = base_url() . $page;
        $config['num_links']        = 5;
        $config['per_page']           = 20;
        $config['uri_segment']        = $segment;
        $config['full_tag_open']   = '<ul class="pagination pagination-sm mb-0 float-right">';
        $config['full_tag_close']  = '</ul>';
        $config['prev_link']        = '« Previous';
        $config['prev_tag_open']   = '<li class="page-item">';
        $config['prev_tag_close']  = '</li>';
        $config['next_link']       = 'Next »';
        $config['next_tag_open']   = '<li class="page-item">';
        $config['next_tag_close']  = '</li>';
        $config['first_link']      = '<i class="fa fa-caret-left"></i>&nbsp; First';
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link']       = 'Last &nbsp;<i class="fa fa-caret-right"></i>';
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        $config['cur_tag_open']    = '<li class="active"><a class="page-link">';
        $config['cur_tag_close']   = '</a></li>';
        $config['total_rows']      = $rows;
        $config['attributes'] = array('class' => 'page-link');

        return $config;
    }
    // basic pagination [END]

    /****** private methods ****/
    /**
	@formdata: data Array
	@notrequiredfield: array key not required
	@customrules: array key with custom form validation
	@customkey: array key with custom key name
     **/
    public function validatefields($formdata, $notrequiredfield = array(), $customrules = array(), $customkey  = array())
    {
        $fielderror = array();
        foreach ($formdata as $key => $val) {
            if (!empty($notrequiredfield) && in_array($key, $notrequiredfield))
                continue;

            $key2 = str_replace('_', ' ', $key);
            if (!empty($customkey) && array_key_exists($key, $customkey)) {
                $key2 = $customkey[$key];
            }
            $key2 = ucwords($key2);

            if (!empty($customrules) && array_key_exists($key, $customrules)) {
                $this->form_validation->set_rules($key, $key2, $customrules[$key]);
            } else {
                $this->form_validation->set_rules($key, $key2, 'trim|required');
            }
        }
        if ($this->form_validation->run() == FALSE) {
            foreach ($formdata as $key => $value) {
                if (in_array($key, $notrequiredfield))
                    continue;

                if (form_error($key))
                    $fielderror[$key] = form_error($key);
            }
        }

        return $fielderror;
    }
}
