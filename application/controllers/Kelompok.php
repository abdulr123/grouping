<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kelompok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    
    }
    
    public function index()
    {

         if($this->session->userdata('role_id') != 2){
            $data['title']      = 'Data Kelompok';
            $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $data['siswa']      = $this->db->get_where('user', ['role_id' => 2 ])->result_array();

            $data['siswa']      = $this->getUserKelompok();
            
            $data['dataclass']  = $this->db->get('data_class')->result_array();
            $data['kelompok']   = $this->db->get('kelompok')->result_array();
           

            $data['kelompok_belajar'] = $this->GetDataAll();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kelompok/index', $data);
            $this->load->view('template/footer');

        } else {
         redirect('auth/blocked');
        }
    }

    public function setGroup(){

        if($this->session->userdata('role_id') != 2){
                   $this->db->count_all_results('kelompok_belajar');  // Produces an integer, like 25
                   $this->db->where('student', $this->input->post('student', true));
                   $this->db->from('kelompok_belajar');
                   $check = $this->db->count_all_results();

                   if ($check === 0) {
                    $data = [
                            'kelompok'  => $this->input->post('kelompok', true),
                            'dosen'     => $this->input->post('dosen', true),
                            'student'   => $this->input->post('student', true),
                            'kelas'   => $this->input->post('kelas', true)

                            ];
                    $this->db->insert('kelompok_belajar', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Pilih Kelompok Berhasil  </div>');

                   }else{

                     $data = [
                            'kelompok'  => $this->input->post('kelompok', true),
                            'dosen'     => $this->input->post('dosen', true),
                            'student'   => $this->input->post('student', true),
                            'kelas'   => $this->input->post('kelas', true)
                            ];
                    $this->db->where('student', $this->input->post('student', true));
                    $this->db->update('kelompok_belajar', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Update Kelompok Berhasil  </div>');

                   }

           redirect('Kelompok/class/'.$this->input->post('kelas', true));
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

    public function GetDataAll(){
        if($this->session->userdata('role_id') != 2){
        $this->db->select('kl.nama_kelompok as nm_k, user.name as nm, data_class.class_name as cname');
        $this->db->from('kelompok_belajar');
        $this->db->join('kelompok as kl','kl.id_kelompok = kelompok_belajar.kelompok');
        $this->db->join('data_class', 'data_class.id = kelompok_belajar.kelas');
        $this->db->join('user', 'user.id = kelompok_belajar.student');
        $query = $this->db->get()->result_array();
         return  $query;

        } else {
        redirect('auth/blocked');
         }
    }

    public function getUserKelompok(){
      if($this->session->userdata('role_id') != 2){
        $this->db->select('user.id, user.email, user.name as name, user.class_name as class_name, k.nama_kelompok as nama_kelompok, kb.kelompok as kid');
        $this->db->from('user');
        $this->db->join('kelompok_belajar as kb','kb.student = user.id' , 'left');
        $this->db->join('kelompok as k','k.id_kelompok = kb.kelompok' , 'left');
        $this->db->where('user.role_id', 2);
        $query = $this->db->get()->result_array();
        return  $query;

         } else {
        redirect('auth/blocked');
         }
    }

    public function GetBobotByEmail(){
        $bobot= $this->db->select('student_id,kategory,bobot')
                                       ->distinct('student_id')

                                       ->order_by('bobot', 'desc')
                                       ->limit(1)
                                       ->where('student_id', $this->input->post('mail', true))
                                       ->get('rule_base_store')
                                       ->result_array();
     echo json_encode($bobot);
    }


   public function class($id)
    {
         if($this->session->userdata('role_id') != 2){
            $data['title']      = 'Data Kelompok';
            $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $data['siswa']      = $this->db->get_where('user', ['role_id' => 2 ])->result_array();

            $data['siswa']      = $this->getUserKelompok();
            
            $data['dataclass']  = $this->db->get_where('data_class', ['id' => $id])->result_array();
            $data['kelompok']   = $this->db->get('kelompok')->result_array();
            $data['id']         = $id;
     
            $data['kelompok_belajar'] = $this->GetDataAll();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kelompok/index', $data);
            $this->load->view('template/footer');

        } else {
         redirect('auth/blocked');
        }
    }

    public function CreateGroup($id){

        if($this->input->post('nama_kelompok', true)){
            
        }

         $data['title']      = 'Data Kelompok';
         $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['kelompok']   = $this->db->get('kelompok')->result_array();
           $data['id']         = $id;

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kelompok/create', $data);
            $this->load->view('template/footer');
    }


    

}
