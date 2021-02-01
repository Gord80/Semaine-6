<?php

defined('BASEPATH') 


class Product extends CI_Controller {


        $this->load->model('produitModel');
     
        $productList = $this->produitModel->list();
        $listView['productList'] = $productList;

        $this->load->view('header');
        $this->load->view('liste');
        $this->load->view('footer');
            
}    