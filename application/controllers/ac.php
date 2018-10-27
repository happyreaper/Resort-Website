<?php

class ac extends CI_Controller{
    
    public function view($page){
        
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        
            $data['activities']=$this->dab->get_acts();    
        
            $this->load->view('templates/header');
            $this->load->view('pages/activities', $data);
            $this->load->view('templates/footer');

    }
}
?>
