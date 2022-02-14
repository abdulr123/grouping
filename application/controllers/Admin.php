<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New role added</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Access Changed! </div>');
    }

    public function datamahasiswa()
    {
        $data['title'] = 'Users Activation';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data1['user'] = $this->db->get('user')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/datamahasiswa', $data1);
        $this->load->view('template/footer');
    }

    public function edit_datamahasiswa($id)
    {
        $where = array('id' => $id);
        $data['UserActivation'] = $this->admin_model->edit_datamahasiswa($where, 'user')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Users Activation';

        $this->form_validation->set_rules('id', 'Id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/edit_datamahasiswa', $data);
            $this->load->view('template/footer');
        } else {
            redirect('admin/datamahasiswa');
        }
    }

    public function update_datamahasiswa()
    {
        $id = $this->input->post('id');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');
        $data = array(
            'id' => $id,
            'role_id' => $role_id,
            'is_active' => $is_active
        );
        $where = array(
            'id' => $id
        );

        $this->admin_model->update_datamahasiswa($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User have been activated</div>');
        redirect('admin/datamahasiswa');
    }

    public function hapus_datamahasiswa($id)
    {
        $where = array('id' => $id);
        $this->admin_model->hapus_datamahasiswa($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User deleted</div>');
        redirect('admin/datamahasiswa');
    }

    public function dataclass()
    {
        $data['title'] = 'Add Class';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data1['class'] = $this->db->get('data_class')->result_array();
        $data1['semester'] = $this->db->get('semester')->result_array();
        $data['year'] = $this->db->get('year')->result_array();

        $this->form_validation->set_rules('class_name', 'Class Name', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('is_active', 'Is_Active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/dataclass', $data1);
            $this->load->view('template/footer');
        } else {
            $data2 = [
                'class_name' => $this->input->post('class_name'),
                'year' => $this->input->post('year'),
                'semester' => $this->input->post('semester'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('data_class', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New class added</div>');
            redirect('admin/dataclass');
        }
    }

    public function edit_dataclass($id)
    {
        $where = array('id' => $id);
        $data['EditClass'] = $this->admin_model->edit_dataclass($where, 'data_class')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        $data['title'] = 'Edit Class';
        $this->form_validation->set_rules('id', 'Id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/edit_dataclass', $data);
            $this->load->view('template/footer');

        } else {
            redirect('admin/dataclass');
        }
    }

    public function update_dataclass()
    {
        $id = $this->input->post('id');
        $class_name = $this->input->post('class_name');
        $year = $this->input->post('year');
        $semester = $this->input->post('semester');
        $is_active = $this->input->post('is_active');

        $data = array(
            'id' => $id,
            'class_name' => $class_name,
            'year' => $year,
            'semester' => $semester,
            'is_active' => $is_active
        );

        $where = array(
            'id' => $id
        );

        $this->admin_model->update_dataclass($where, $data, 'data_class');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Class have been update</div>');
        redirect('admin/dataclass');
    }

    public function hapus_dataclass($id)
    {
        $where = array('id' => $id);
        $this->admin_model->hapus_dataclass($where, 'data_class');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Class deleted</div>');
        redirect('admin/dataclass');
    }

    public function major()
    {
        $data['title'] = 'Add Major';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['major'] = $this->db->get('major')->result_array();

        $this->form_validation->set_rules('idMajor', 'Code Major', 'required');
        $this->form_validation->set_rules('major', 'Major', 'required');
        $this->form_validation->set_rules('is_active', 'Is_Active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/major', $data);
            $this->load->view('template/footer');

        } else {

            $data2 = [
                'idMajor' => $this->input->post('idMajor'),
                'major' => $this->input->post('major'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('major', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New major added</div>');
            redirect('admin/major');
        }
    }

    public function hapus_major($id)
    {
        $where = array('idMajor' => $id);
        $this->admin_model->hapus_dataclass($where, 'major');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Class deleted</div>');
        redirect('admin/major');
    }

    public function subject()
    {
        $data['title'] = 'Add Subject';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subject'] = $this->db->get('subject')->result_array();
        $data['lecturer'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        $data['year'] = $this->db->get('year')->result_array();
        $data['class'] = $this->db->get('data_class')->result_array();

        $this->form_validation->set_rules('code_subject', 'Code Subject', 'required');
        $this->form_validation->set_rules('name_subject', 'Subject Name', 'required');
        $this->form_validation->set_rules('is_active', 'Is_Active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/subject', $data);
            $this->load->view('template/footer');
        } else {
            $data2 = [
                'code_subject' => $this->input->post('code_subject'),
                'name_subject' => $this->input->post('name_subject'),
                'lecturer' => $this->input->post('lecturer'),
                'semester' => $this->input->post('semester'),
                'year' => $this->input->post('year'),
                'class_name' => $this->input->post('class_name'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('subject', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New subject added</div>');
            redirect('admin/subject');
        }
    }

    public function edit_subject($id)
    {
        $where = array('id' => $id);
        $data['EditSubject'] = $this->admin_model->edit_subject($where, 'subject')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subject'] = $this->db->get('subject')->result_array();
        $data['lecturer'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        $data['year'] = $this->db->get('year')->result_array();
        $data['class'] = $this->db->get('data_class')->result_array();
        $data['title'] = 'Edit Subject';

        $this->form_validation->set_rules('id', 'Id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/edit_subject', $data);
            $this->load->view('template/footer');
        } else {
            redirect('admin/subject');
        }
    }

    public function update_subject()
    {
        $id = $this->input->post('id');
        $code_subject = $this->input->post('code_subject');
        $name_subject = $this->input->post('name_subject');
        $semester = $this->input->post('semester');
        $year = $this->input->post('year');
        $class_name = $this->input->post('class_name');
        $lecturer = $this->input->post('lecturer');
        $is_active = $this->input->post('is_active');

        $data = array(
            'id' => $id,
            'code_subject' => $code_subject,
            'name_subject' => $name_subject,
            'semester' => $semester,
            'year' => $year,
            'class_name' => $class_name,
            'lecturer' => $lecturer,
            'is_active' => $is_active
        );

        $where = array(
            'id' => $id
        );

        $this->admin_model->update_subject($where, $data, 'subject');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Subject have been update</div>');
        redirect('admin/subject');
    }

    public function hapus_subject($id)
    {
        $where = array('id' => $id);
        $this->admin_model->hapus_subject($where, 'subject');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Class deleted</div>');
        redirect('admin/subject');
    }

    public function students()
    {
        $data['title'] = 'Students Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
        $data['students'] = $this->db->get('user')->row_array();
        $data['major'] = $this->db->get('major')->row_array();
        $data['class'] = $this->db->get('data_class')->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/students', $data);
        $this->load->view('template/footer');
    }

    public function lecturer()
    {
        $data['title'] = 'Lecturer Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
        $data['lecturer'] = $this->db->get('user')->row_array();
        $data['class'] = $this->db->get('data_class')->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/lecturer', $data);
        $this->load->view('template/footer');

    }

}

