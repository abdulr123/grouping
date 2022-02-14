<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Pasword', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password is wrong! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered! </div>');
            redirect('auth');
        }
    }

    public function registration()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email already registered!']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short', 'max_length' => 'Password too long']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('class_name', 'Class_Name', 'required');
        $this->form_validation->set_rules('major', 'major', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $data['class'] = $this->db->get('data_class')->result_array();
            $data['major'] = $this->db->get('major')->result_array();

            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'class_name' => htmlspecialchars($this->input->post('class_name', true)),
                'major' => htmlspecialchars($this->input->post('major', true)),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Your account has been created! Please login  </div>');
            redirect('auth');
        }
    }

    public function registration_lecturer()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email already registered!']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short', 'max_length' => 'Password too long']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nidn', 'NIDN', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';


            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration_lecturer', $data);
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nidn' => htmlspecialchars($this->input->post('nidn', true)),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Your account has been created! Please login  </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');


        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Your have been logout!  </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
