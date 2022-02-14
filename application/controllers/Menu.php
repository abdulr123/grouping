<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New submenu added</div>');
            redirect('menu/submenu');
        }
    }


    public function hapus_menu($id)
    {
        $where = array('id' => $id);
        $this->menu_model->hapus_menu($where, 'user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu deleted</div>');
        redirect('menu');
    }


    public function hapus_submenu($id)
    {
        $where = array('id' => $id);
        $this->menu_model->hapus_submenu($where, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu deleted</div>');
        redirect('menu/submenu');
    }

    public function edit_menu($id)
    {
        $where = array('id' => $id);
        $data['menu'] = $this->menu_model->edit_menu($where, 'user_menu')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Menu Management';


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu have been edit</div>');
            redirect('menu');
        }
    }

    public function edit_submenu($id)
    {
        $where = array('id' => $id);
        $data['subMenu'] = $this->menu_model->edit_submenu($where, 'user_sub_menu')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Submenu Management';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('template/footer');
        } else {
            redirect('menu/submenu');
        }
    }




    public function update_menu()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');


        $data = array(
            'id' => $id,
            'menu' => $menu
        );

        $where = array(
            'id' => $id
        );

        $this->menu_model->update_menu($where, $data, 'user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu have been edit</div>');
        redirect('menu');
    }

    public function update_submenu()
    {
        $id = $this->input->post('id');
        $menu_id = $this->input->post('menu_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');


        $data = array(
            'id' => $id,
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
        );

        $where = array(
            'id' => $id
        );

        $this->menu_model->update_submenu($where, $data, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu have been edit</div>');
        redirect('menu/submenu');
    }
}
