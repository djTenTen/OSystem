<?php
class Canteen_controller extends CI_Controller{

//Menu

    public function menuManagement(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'menu';
            if(!file_exists(APPPATH.'views/canteen/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Menu Management";

                $keyword = $this->input->post('txtsearch');
                
                if (empty($keyword)){
                    $data['menu'] = $this->Canteen_model->viewMenu();
                    $this->load->view('templates/header',$data);
                    $this->load->view('canteen/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    //$data['enrollStudents'] = $this->Cashier_model->viewassesdSeniorhighSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('canteen/'.$page, $data);
                    $this->load->view('templates/footer');
                }                        
            }
        }else{
            redirect(base_url());
        }
    }

    public function addMenu(){

        $this->Canteen_model->insertMenu();
        $this->session->set_flashdata('Menu_Added','The Menu has been added');
        redirect('menu');
    }

    public function updateMenu($id){
        $this->Canteen_model->updateMenu($id);
        $this->session->set_flashdata('Menu_Updated','The Menu has been updated');
        redirect('menu');
    }

    public function deleteMenu($id){
        $this->Canteen_model->deleteMenu($id);
        $this->session->set_flashdata('Menu_Deleted','The Menu has been deleted');
        redirect('menu');
    }



//Product

    public function productManagement(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'product';
            if(!file_exists(APPPATH.'views/canteen/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Product Management";

                $keyword = $this->input->post('txtsearch');
                
                if (empty($keyword)){
                    $data['product'] = $this->Canteen_model->viewProduct();
                    $this->load->view('templates/header',$data);
                    $this->load->view('canteen/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    // $data['menu'] = $this->Canteen_model->viewMenu();
                    $this->load->view('templates/header',$data);
                    $this->load->view('canteen/'.$page, $data);
                    $this->load->view('templates/footer');
                }                          
            }
        }else{
            redirect(base_url());
        }
    }

    public function addProduct(){

        $this->Canteen_model->insertProduct();
        $this->session->set_flashdata('Product_Added','The Product has been added');
        redirect('product');
    }

    public function updateProduct($id){
        $this->Canteen_model->updateProduct($id);
        $this->session->set_flashdata('Product_Updated','The Product has been updated');
        redirect('product');
    }

    public function deleteProduct($id){
        $this->Canteen_model->deleteProduct($id);
        $this->session->set_flashdata('Product_Deleted','The Product has been deleted');
        redirect('product');
    }

    public function addStock($id){
        $this->Canteen_model->addStock($id);
        $this->session->set_flashdata('Addstock_Updated','The Stocks has been updated');
        redirect('product');
    }







}