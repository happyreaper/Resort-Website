<?php
	class shopping extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function shop($shoppingData){
			$this->db->trans_start();
			
			$this->db->insert('cart', $shoppingData);
			
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
			    $this->db->trans_rollback();
			    return "Error while shopping. Please try again later.";
			}
			else{
				$this->db->trans_commit();
				return "Shopping successful for ".$shoppingData['fname']." ".$shoppingData['lname']." for products ".str_replace('~', ',', rtrim($shoppingData['products'], '~'))." and payment made for $".$shoppingData['totalcost'].".";
			}

		}

		
	}
