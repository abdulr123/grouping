<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function material()
    {
        $data['title'] = 'Material';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subject'] = $this->db->get('subject')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('students/material', $data);
        $this->load->view('template/footer');
    }

    public function groups()
    {
        // print_r( $this->session->userdata('id'));exit();
        $id = 1;
        $data['title'] = 'Groups & Tasks';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // print_r($data['user'] );exit();

        $data['siswa']      = $this->getUserKelompok();
            
        $data['dataclass']  = $this->db->get_where('data_class', ['id' => $id])->result_array();
        $data['kelompok']   = $this->db->get('kelompok')->result_array();
        $data['id']         = $id;
     
        $data['kelompok_belajar'] = $this->GetDataAll();




        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('students/groups', $data);
        $this->load->view('template/footer');
    }

    public function GetDataAll(){
        $this->db->select('kl.nama_kelompok as nm_k, user.name as nm, user.id as uid, data_class.class_name as cname');
        $this->db->from('kelompok_belajar');
        $this->db->join('kelompok as kl','kl.id_kelompok = kelompok_belajar.kelompok');
        $this->db->join('data_class', 'data_class.id = kelompok_belajar.kelas');
        $this->db->join('user', 'user.id = kelompok_belajar.student');
        $query = $this->db->get()->result_array();
         return  $query;
    }

    public function getUserKelompok(){

        $this->db->select('user.id, user.email, user.name as name, user.class_name as class_name, k.nama_kelompok as nama_kelompok, kb.kelompok as kid');
        $this->db->from('user');
        $this->db->join('kelompok_belajar as kb','kb.student = user.id' , 'left');
        $this->db->join('kelompok as k','k.id_kelompok = kb.kelompok' , 'left');
        $this->db->where('user.role_id', 2);
        $query = $this->db->get()->result_array();
        return  $query;
    }

}