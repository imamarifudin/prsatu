<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    function get()
    {
        $data = $this->db->get('user');
        return $data;
    }

}
