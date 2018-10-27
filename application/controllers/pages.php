<?php


class Pages extends CI_Controller{
    
    public function view($page='index'){
        
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        
        $data['title']=ucfirst($page);
        
        
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->helper('url');
    }
    
    
    public function create(){
        
        $date[title]="Reservation";
        
        $this->form_validation->set_rules('fname', 'Fname', 'required');
        $this->form_validation->set_rules('lname', 'Lname', 'required');
        
        if($this->form_validation->run()===FALSE){
            
            $this->load->view('templates/header');
            $this->load->view('pages/reservation', $data);
            $this->load->view('templates/footer');
        }
        else{
            
            $this->post_model->set_post();
            $this->load->view('templates/header');
            $this->load->view('pages/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        
    }
}

?>
