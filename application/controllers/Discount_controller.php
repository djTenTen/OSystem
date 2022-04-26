<?php
class Discount_controller extends CI_Controller{

    public function Discount(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'discount';
            if(!file_exists(APPPATH.'views/discount/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Discount Management"; 

                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['discount'] = $this->Discount_model->viewDiscount();
                    $this->load->view('templates/header',$data);
                    $this->load->view('discount/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['discount'] = $this->Discount_model->viewDiscountSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('discount/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            }
        }else{
            redirect(base_url());
        }
    }

    public function addDiscount(){

        $this->Discount_model->addDiscount();
        $this->session->set_flashdata('added','The User has been added');
        redirect('discount');
    
    }

    public function updateDiscount($DiscountID){

        $this->Discount_model->updateDiscount($DiscountID);
        $this->session->set_flashdata('updated','The User has been added');
        redirect('discount');
    
    }

    public function deleteDiscount($DiscountID){

        $this->Discount_model->deleteDiscount($DiscountID);
        $this->session->set_flashdata('deleted','The User has been added');
        redirect('discount');
    
    }


    
    

    


    

}