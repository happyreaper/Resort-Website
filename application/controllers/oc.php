<?php
	class oc extends CI_Controller{
		public function view($page){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->load->library('session');
			if(empty($_SESSION['cart_item'])){
				echo "<script type='text/javascript'>"; 
	            echo "alert('Cart is empty.');"; 
	            echo "</script>";
	            $page = 'shop';
			}
			else{
				$this->load->library('form_validation');
				$products = "";
				$totalcost = 0;
			   	foreach ($_SESSION["cart_item"] as $item){
			    	$products = $products . $item["name"] . ":" . (string)$item["quantity"] . "~";
			    	$totalcost += ($item["price"]*$item["quantity"]);
			   	}

				$shoppingData['fname'] = set_value("fName");
				$shoppingData['lname'] = set_value("lName");
				$shoppingData['email'] = set_value("myEmail");
                $shoppingData['products'] = $products;
				$shoppingData['totalcost'] = $totalcost;

				$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				$this->form_validation->set_rules('fName', 'First Name', 'required|alpha');
				$this->form_validation->set_rules('lName', 'Last Name', 'required|alpha');
				$this->form_validation->set_rules('myEmail', 'Email', 'required|valid_email');

				if ($this->form_validation->run() == FALSE)
				{
					$data['shoppingData'] = $shoppingData;
				}
				else{
					
					$ShoppingMessage = $this->shopping->shop($shoppingData);
					unset($_SESSION['cart_item']);
					$this->session->sess_destroy();
					$page = 'index';
					echo "<script type='text/javascript'>"; 
		            echo "alert('$ShoppingMessage');"; 
		            echo "</script>";
		        }
		    }
		}
			$data['title'] = ucfirst($page);
			
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}
