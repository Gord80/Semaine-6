  <? 
  public function delete($id) {
        $this->load->helper('url');
        $this->load->model('Prod_model');
        $this->Prod_model->delete($id);
        // on redirige sur la liste produits
        redirect('produits/liste');
    }    