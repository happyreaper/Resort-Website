<?php
	class mresc extends CI_Controller{
		public function view($page){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}				
			if($this->input->server('REQUEST_METHOD') == 'POST'){
				$email = $this->input->post('myEmail');
				if(!empty($email)){
					$data['reservation'] = $this->dab->get_reservation($email);
					if(empty($data['reservation'])){
						echo "<script type='text/javascript'>"; 
					    echo "alert('Record not found.');"; 
					    echo "</script>";
					}
				}
				else{
					echo "<script type='text/javascript'>"; 
				    echo "alert('Please enter email.');"; 
				    echo "</script>";
				}	
			}
			
			$data['yurts'] = $this->dab->get_yurts();
			$data['activities'] = $this->dab->get_acts();
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}
