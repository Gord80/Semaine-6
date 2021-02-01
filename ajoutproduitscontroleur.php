   <?php 
    public function addProduct()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->input->post())
        {
            $this->form_validation->set_rules(
                    'pro_cat_id', 'Catégories', 'required|regex_match[/^[a-zA-Z\d]', array('required' => 'Le champs catégorie n\'est pas renseigné', 'regex_match' => 'Champs catégorie non valide'));
            $this->form_validation->set_rules(
                    'pro_ref', 'Référence', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs référence n\'est pas renseigné', 'regex_match' => 'Champs référence non valide'));
            $this->form_validation->set_rules(
                    'pro_couleur', 'Couleur', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs couleur n\'est pas renseigné', 'regex_match' => 'Champs couleur non valide'));
            $this->form_validation->set_rules(
                    'pro_libelle', 'Libellé', 'required|regex_match[/^[a-zA-Z\d]+$/]', array('required' => 'Le champs libellé n\'est pas renseigné', 'regex_match' => 'Champs libellé non valide'));
            $this->form_validation->set_rules(
                    'pro_prix', 'Prix', 'required|regex_match[/^[\d]+[.]?[\d]{1,2}$/]', array('required' => 'Le champs prix n\'est pas renseigné', 'regex_match' => 'Champs prix non valide'));
            $this->form_validation->set_rules(
                    'pro_stock', 'Stock', 'required|regex_match[/^[\d]+$/]', array('required' => 'Le champs stock n\'est pas renseigné', 'regex_match' => 'Champs stock non valide'));
            $this->form_validation->set_rules(
                    'pro_description', 'Description', 'required|regex_match[/^[a-zA-Z\d\|\_ ÃªÃ«Ã¹Ã¼Ã»Ã®Ã¯Ã Ã¤Ã¢Ã¶Ã´\,\.\:\;\!\?]+$/]', array('required' => 'Le champs description n\'est pas renseigné', 'regex_match' => 'Champs description non valide'));
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->model('Cat_model');
                $categoriesList = $this->Cat_model->categoriesList();
                $catView['categoriesList'] = $categoriesList;
                $this->load->view('header');
                $this->load->view('addProduct', $catView);
                $this->load->view('footer');
            }
            else
            {
                // chemin d'enregistrement
                $config['upload_path'] = realpath('assets/img/');
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("pro_photo");
                $error = $this->upload->display_errors();
                if ($error == '')
                {
                    $file = $this->upload->data();

                    $this->load->model('Prod_model');
                    $this->Prod_model->addProduct();
                    $id = $this->db->insert_id();
                    rename($file["full_path"], realpath('assets/img/') . "/" . $id . $file["file_ext"]);
                    $this->load->view('header');
                    $this->load->view('confirmAdd');
                    $this->load->view('footer');

                }
                else
                {
                    // appel de la classe catégoriesModel
                    $this->load->model('Cat_model');
                    // appel de la méthode liste.
                    $categoriesList = $this->Cat_model->categoriesList();
                    // ajout des résultats de la requête
                    $catView['categoriesList'] = $categoriesList;
                    $catView['error'] = $error;
                     // Affichage du formulaire d'ajout
                    $this->load->view('header');
                    $this->load->view('addProduct', $catView);
                    $this->load->view('footer');
                }
            }
        }