<?php
class Custodian_controller extends CI_Controller{


    //INVENTORY
    public function inventoryMangement(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'inventory';
            if(!file_exists(APPPATH.'views/custodian/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Inventory Management";

                $keyword = $this->input->post('searchinventory');
                
                if (empty($keyword)){
                    $data['inventory'] = $this->Custodian_model->viewInventory();
                    $this->load->view('templates/header',$data);
                    $this->load->view('custodian/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['inventory'] = $this->Custodian_model->viewInventorySearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('custodian/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }

    public function addInventory(){

        $this->Custodian_model->insertInventory();
        $this->session->set_flashdata('Inventory_Added','The Inventory has been added');
        redirect('inventory');
    
    }

    public function updateInventory($ID){

        $this->Custodian_model->editInventory($ID);
        $this->session->set_flashdata('Inventory_Updated','The Inventory has been updated');
        redirect('inventory');
    
    }


    public function deleteInventory($ID){

        $this->Custodian_model->deleteInventory($ID);
        $this->session->set_flashdata('Inventory_Deleted','The Inventory has been deleted');
        redirect('inventory');
    
    }










    //DEPLOYMENT

    public function deploymentManagement(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'deployment';
            if(!file_exists(APPPATH.'views/custodian/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Deployment Management";

                $keyword = $this->input->post('searchdeployment');
                
                if (empty($keyword)){
                    $data['inventory'] = $this->Custodian_model->viewInventory();
                    $data['employee'] = $this->Humanresource_model->viewEmployees();
                    $data['tempitems'] = $this->Custodian_model->viewTempItems();
                    $data['deployments'] = $this->Custodian_model->viewDeployment();
                    $this->load->view('templates/header',$data);
                    $this->load->view('custodian/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['inventory'] = $this->Custodian_model->viewInventory();
                    $data['employee'] = $this->Humanresource_model->viewEmployees();
                    $data['tempitems'] = $this->Custodian_model->viewTempItems();
                    $data['deployments'] = $this->Custodian_model->viewDeploymentSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('custodian/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }
    


    public function addItemTemp(){

        $invtID = $this->input->post('item');
        $needqty = $this->input->post('quantity');
        $query = $this->db->query("select Quantity from inventory where InventoryID = '$invtID'");
        foreach($query->result_array() as $row){
                $oldqty = $row['Quantity'];
        }
        if($needqty > $oldqty){
            $this->session->set_flashdata('Insuficient','The User has been added');
            redirect('deployment');
        }else{
            $this->Custodian_model->insertItemTemp();
            redirect('deployment');
        }

    }

    public function removeItemTemp($ID){

        $this->Custodian_model->removeItemTemp($ID);
        redirect('deployment');
    
    }
   

    public function addDeployment(){

        $this->Custodian_model->addDeployment();
        $this->session->set_flashdata('Add_deployment','Deployment added');
        redirect('deployment');
    
    }

    public function removeDeployment($ID){

        $this->Custodian_model->removeDeployment($ID);
        $this->session->set_flashdata('Remove_deployment','Deployment removed');
        redirect('deployment');
    
    }

    public function updateDeployment($ID){

        $this->Custodian_model->updateDeployment($ID);
        $this->session->set_flashdata('Update_deployment','Update removed');
        redirect('deployment');
    
    }

    public function returnItem($invtryID,$dplymtID){

        $this->Custodian_model->returnItem($invtryID,$dplymtID);
        $this->session->set_flashdata('Item_Returned','Update removed');
        redirect('deployment');
    
    }
    
    



    

}