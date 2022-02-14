<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();       
    }
    
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            //cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!  </div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[3]|max_length[8]');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|max_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('template/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password!  </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New password cannot be the same ad current password!  </div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah oke
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password changed!  </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function listClass(){
         if($this->session->userdata('role_id') != 2){
            $data['title'] = 'Data Kelompok';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['dataclass'] = $this->db->get('data_class')->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('lecturer/kelompok', $data);
            $this->load->view('template/footer');

        } else {
        redirect('auth/blocked');
    }
    }

     public function ListGroup(){
         if($this->session->userdata('role_id') != 2){
            $data['title'] = 'Data Kelompok';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['dataclass'] = $this->db->get('data_class')->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('lecturer/kelompok', $data);
            $this->load->view('template/footer');

        } else {
        redirect('auth/blocked');
    }
    }

    
    public function Rolebase($performa = ''){
        if($this->session->userdata('role_id') != 2){
   
        $data['title']  = 'Performa Akademik';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $data['siswa'] =  $this->db->select('email, name, class_name')
                                    ->get_where('user', [
                                                         'role_id' => 2,
                                                         'class_name' => $performa
                                                         ])
                                    
                                    ->result_array();

        $data['rbase'] =  $this->db->order_by('bobot', 'desc')->get_where('rule_base_store')->result_array();
        $data['tbase'] =  $this->db->select('student_id')
                                   ->distinct('student_id')
                                   ->order_by('bobot', 'desc')
                                   ->get('rule_base_store')
                                   ->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);  
        $this->load->view('user/grouping', $data);
        $this->load->view('template/footer');

    } else {
        redirect('auth/blocked');
    }

    }
    public function Hitung(){
        $a_p = "CALL hitung_sp(?,?,?,?,?,?,?,?,?,?)";
        $a_result = $this->db->query($a_p, array(
                                                    'ageBase'       =>  (int)$this->input->post('age'),
                                                    'genderBase'    =>  $this->input->post('gender'),
                                                    'emiBase'       =>  $this->input->post('emi'),
                                                    'gsBase'        =>  $this->input->post('gs'),
                                                    'tnBase'        =>  $this->input->post('tn'),
                                                    'hwBase'        =>  $this->input->post('hw'),
                                                    'mtgBase'       =>  (int)$this->input->post('mtg'),
                                                    'fgBase'        =>  (int)$this->input->post('fg'),
                                                    'kategoryBase'  =>  $this->input->post('kategory'),
                                                    'studentBase'   =>  $this->session->userdata('email')
                                                ));

        echo json_encode($a_result);
    }

    public function checkExistingPerform(){
        json_encode($this->session->userdata('email'));
        $id = $this->session->userdata('email');
        // exit();
        $query = $this->db->query('SELECT student_id FROM rule_base_store where student_id="'.$id.'" ');
        echo json_encode($query->num_rows());
       
    }
    public function performaReset($id){

        $this->db->where('student_id', $id);
        $this->db->delete('rule_base_store');
        redirect('User/Rolebase'); 
    }
}
