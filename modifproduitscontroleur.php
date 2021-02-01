  <?  public function update($id)
    {
        $this->output->enable_profiler(TRUE);
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->input->post())
        {
            $this->form_validation->set_rules(
                    'pro_cat_id', 'Catégories', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs catégorie n\'est pas renseigné', 'regex_match' => 'Champs catégorie non valide'));
            $this->form_validation->set_rules(
                    'pro_ref', 'Référence', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs référence n\'est pas renseigné', 'regex_match' => 'Champs référence non valide'));
            $this->form_validation->set_rules(
                    'pro_couleur', 'Couleur', 'required|regex_match[/^[a-zA-Z]+$/]', array('required' => 'Le champs couleur n\'est pas renseigné', 'regex_match' => 'Champs couleur non valide'));
            $this->form_validation->set_rules(
                    'pro_libelle', 'Libellé', 'required|regex_match[/^[a-zA-Z\d ]+$/]', array('required' => 'Le champs libellé n\'est pas renseigné', 'regex_match' => 'Champs libellé non valide'));
            $this->form_validation->set_rules(
                    'pro_prix', 'Prix', 'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]', array('required' => 'Le champs prix n\'est pas renseigné', 'regex_match' => 'Champs prix non valide'));
            $this->form_validation->set_rules(
                    'pro_stock', 'Stock', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs stock n\'est pas renseigné', 'regex_match' => 'Champs stock non valide'));
            $this->form_validation->set_rules(
                    'pro_description', 'Description', 'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]', array('required' => 'Le champs description n\'est pas renseigné', 'regex_match' => 'Champs description non valide'));
            if ($this->form_validation->run() == FALSE)
            {

                
                $this->load->model('Prod_model');
               
                $productById = $this->Prod_model->productById($id);
                $productByIdView['produits'] = $productById->row();
                $this->load->model('Cat_model');
                $categoriesList = $this->Cat_model->categoriesList();
                $productByIdView['categoriesList'] = $categoriesList;
                $this->load->view('header');
                $this->load->view('updateProduct', $productByIdView);
                $this->load->view('footer');
            }
            else
            {
                $data = $this->input->post();
                
                $config['upload_path'] = realpath('assets/img/');
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('pro_photo'))
                {
                    $error = $this->upload->display_errors();
                    $file = $this->upload->data();
                    rename($file['full_path'], realpath('assets/img/') . '/' . $id . $file['file_ext']);
                }
                $this->load->model('Prod_model');
                $this->Prod_model->update($id);
                $this->load->view('header');
                $this->load->view('confirm');
                $this->load->view('footer');
            }
        }
        else
        {
        
            $this->load->model('Prod_model');
            $productById = $this->Prod_model->productById($id);
            $productByIdView['produits'] = $productById->row();
            $this->load->model('Cat_model');
            $categoriesList = $this->Cat_model->categoriesList();
            $productByIdView['categoriesList'] = $categoriesList;
            $this->load->view('header');
            $this->load->view('updateProduct', $productByIdView);
            $this->load->view('footer');
        }
    }
                    