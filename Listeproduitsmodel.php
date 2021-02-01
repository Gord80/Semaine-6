<?php

if (!defined('BASEPATH'))

class produitModel extends CI_model {

    public function list() {
    
        $this->load->database();
        $query = 'SELECT * from `produits`';
        $result = $this->db->query($query);
        $productList = $result->result();
        return $productList;
        }
    }    