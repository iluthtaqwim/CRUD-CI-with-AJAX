<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('head_dt');
        $this->load->view('index');
    }
}
