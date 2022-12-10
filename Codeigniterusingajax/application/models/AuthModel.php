
<?php


class AuthModel extends CI_Model{




    public function insert_item($table,$response)
    {    
        
        return $this->db->insert($table, $response);
    }
    public function userLogin($response){ 

        $this->db->select('*');
        $this->db->from('user');

        $this->db->where($response);
        $query = $this->db->get();
        return $query->row_array();
    }
}
?>