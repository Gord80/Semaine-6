 <? public function update($id)
    {
        $this->load->database();
        $file = $this->upload->data();
        $data = $this->input->post();
        if ($this->upload->do_upload('pro_photo'))
        {
            $data['pro_photo'] = substr($file['file_ext'], 1);
        }
        $data['pro_d_modif'] = date('Y-m-d');
        $this->db->where('pro_id', $id);
        $this->db->update('produits', $data);        
    } 
    