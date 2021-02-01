<? public function delete($id)
    {
        $this->load->database();
        $this->db->where('pro_id', $id);
        $this->db->delete('produits');   
    }    