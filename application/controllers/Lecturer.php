<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Lecturer extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in();

    }



    public function material()

    {       
        $data['title'] = 'Add Material';       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sb'] = $this->db->get_where('subject', ['lecturer' => $this->session->userdata('email')])->result_array();
    
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lecturer/material', $data);
        $this->load->view('template/footer');

    }


    public function detail_material()

    {
        
        $data['title'] = 'Add Material';      
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_material'] = $this->db->get('detail_material')->result_array();        

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lecturer/detail_material', $data);
        $this->load->view('template/footer');
    }

    public function dataclass()

    {
        $data['title'] = 'Data Class';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataclass'] = $this->db->get('data_class')->result_array();
        

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lecturer/dataclass', $data);
        $this->load->view('template/footer');
    }

    public function groups()

    {
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lecturer/class', $data);
        $this->load->view('template/footer');
    }

}

