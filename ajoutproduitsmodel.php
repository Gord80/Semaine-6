    <?php 
    public function addProduct()
    {
        // connexion à la base de données
        $this->load->database();
        $file = $this->upload->data();
        // récupération des données du formulaire
        $data = $this->input->post();
        // récupération et avec date d'ajout du produit
        $data["pro_d_ajout"] = date("Y-m-d");
        // récupération de l'extension du fichier en vue de son insertion en bdd.
        $data["pro_photo"] = substr($file["file_ext"], 1);
        // insertion des données du formulaire en bdd.
        $this->db->insert("produits", $data);
    }
