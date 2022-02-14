<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GroupingModel extends CI_Model
{


    public function GetRoleBase()
    {
        $roll_base = "CALL hitung_prediksi()";
        $this->db->query($roll_base);
        return $roll_base;

    }
}
