<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rolebase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {



        // $data = $this->db->query('CALL get_rolebase_sp()');
        // $result = $data->result_array();
  
        // $this->db->query("call hitung_sp(20,'Perempuan','Kadang - Kadang','Tidak','Sering','Selalu',89,90,'Very Bad','12')");
        // $this->db->query("call hitung_sp(20,'Perempuan','Kadang - Kadang','Tidak','Sering','Selalu',89,90,'Bad','12')");
        // $this->db->query("call hitung_sp(20,'Perempuan','Kadang - Kadang','Tidak','Sering','Selalu',89,90,'Average','12')");
       
        if ($this->db->query("call hitung_sp(20,'Perempuan','Kadang - Kadang','Tidak','Sering','Selalu',89,90,'Very Bad','12')"))
            {
                    echo "Success!";
                    if ($this->db->query("call hitung_sp(20,'Perempuan','Kadang - Kadang','Tidak','Sering','Selalu',89,90,'Bad','12')"))
                        {
                                echo "Success!";
                        }
            }
       
        exit();
        
        $a_p = "CALL hitung_sp(?,?,?,?,?,?,?,?,?,?)";
        $a_result = $this->db->query($a_p, array(
                                                    'ageBase'       =>  '20',
                                                    'genderBase'    =>  'Perempuan',
                                                    'emiBase'       =>  'Kadang - Kadang',
                                                    'gsBase'        =>  'Tidak',
                                                    'tnBase'        =>  'Sering',
                                                    'hwBase'        =>  'Selalu',
                                                    'mtgBase'       =>   89,
                                                    'fgBase'        =>   90,
                                                    'kategoryBase'  =>  'Very Bad',
                                                    'studentBase'   =>  '12'
                                                ));
        $bad_p = "CALL hitung_sp(?,?,?,?,?,?,?,?,?,?)";
        $bad_result = $this->db->query($bad_p, array(
                                                    'ageBase'       =>  '20',
                                                    'genderBase'    =>  'Perempuan',
                                                    'emiBase'       =>  'Kadang - Kadang',
                                                    'gsBase'        =>  'Tidak',
                                                    'tnBase'        =>  'Sering',
                                                    'hwBase'        =>  'Selalu',
                                                    'mtgBase'       =>   89,
                                                    'fgBase'        =>   90,
                                                    'kategoryBase'  =>  'Bad',
                                                    'studentBase'   =>  '12'
                                                ));
                                                
            // $this->VeryBad();
            // $this->Bad();
           
       
    }
    
    public function VeryBad(){
        $a_p = "CALL hitung_sp(?,?,?,?,?,?,?,?,?,?)";
        $a_result = $this->db->query($a_p, array(
                                                    'ageBase'       =>  20,
                                                    'genderBase'    =>  'Perempuan',
                                                    'emiBase'       =>  'Kadang - Kadang',
                                                    'gsBase'        =>  'Tidak',
                                                    'tnBase'        =>  'Sering',
                                                    'hwBase'        =>  'Selalu',
                                                    'mtgBase'       =>   89,
                                                    'fgBase'        =>   90,
                                                    'kategoryBase'  =>  'Very Bad',
                                                    'studentBase'   =>  '12'
                                                ));
        
    }

    public function Bad(){
        $a_p = "CALL hitung_sp(?,?,?,?,?,?,?,?,?,?)";
        $a_result = $this->db->query($a_p, array(
                                                    'ageBase'       =>  20,
                                                    'genderBase'    =>  'Perempuan',
                                                    'emiBase'       =>  'Kadang - Kadang',
                                                    'gsBase'        =>  'Tidak',
                                                    'tnBase'        =>  'Sering',
                                                    'hwBase'        =>  'Selalu',
                                                    'mtgBase'       =>   89,
                                                    'fgBase'        =>   90,
                                                    'kategoryBase'  =>  'Bad',
                                                    'studentBase'   =>  '12'
                                                ));
        
    }

    public function FormBase(){
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/grouping', $data);
        $this->load->view('template/footer');
    }

 
}
