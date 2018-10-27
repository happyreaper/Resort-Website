<?php

class yc extends CI_Controller{
    
    public function view($page){
        
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        
            $data['yurts']=$this->dab->get_yurts();
                
        
            $this->load->view('templates/header');
            $this->load->view('pages/yurts', $data);
            $this->load->view('templates/footer');

    }
}
?>
