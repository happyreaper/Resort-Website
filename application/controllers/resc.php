<?php

class resc extends CI_Controller{
    
    public function view($page){
        
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        
            $data['yurts'] = $this->dab->get_yurts();
			$data['activities'] = $this->dab->get_acts();
			if($this->input->server('REQUEST_METHOD') == 'POST'){
                $this->load->library('form_validation');

				$reservationData['fname'] = set_value("fName");
				$reservationData['lname'] = set_value("lName");
				$reservationData['email'] = set_value("myEmail");
				$reservationData['phone'] = set_value("myPhone");
				$reservationData['address'] = set_value("myAddress");
				$reservationData['arrival'] = set_value("arrDate");
				$reservationData['no_ofnights'] = set_value("Nights");
				$reservationData['comments'] = set_value("myComment");
				$reservationData['activityid'] = set_value("myActivity");
				$reservationData['packageid'] = set_value("myPackage");
				$reservationData['dates'] = set_value("whenDate");
				
				$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				$this->form_validation->set_rules('fName', 'First Name', 'required|alpha');
				$this->form_validation->set_rules('lName', 'Last Name', 'required|alpha');
				$this->form_validation->set_rules('myEmail', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('myPhone', 'Phone', 'regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('Nights', 'Nights', 'integer|greater_than[0]|less_than[15]');
				$this->form_validation->set_rules('myComment', 'Comments', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$data['reservationData'] = $reservationData;
				}
				else{
					
					$ReservationMessage = $this->makeres->make_reservation($reservationData);
					echo "<script type='text/javascript'>"; 
		            echo "alert('$ReservationMessage');"; 
		            echo "</script>";
		        }
			}
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }
}
?>
