<?php
	class makeres extends CI_Model{
		public function __construct(){
			$this->load->database();
			$this->load->helper('array');
		}

		public function make_reservation($reservationData){
			$this->db->trans_start();
			$reservationyurtData = elements(array('arrival', 'no_ofnights', 'packageid'), $reservationData);
			
			$this->db->insert('reservationyurt',$reservationyurtData);
			if($this->db->affected_rows() > 0){
				$this->db->select('resid');
				$this->db->from('reservationyurt');
				$this->db->order_by("resid", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$resID = $query->result_array()[0]['resid'];
				$clientData = elements(array('fname', 'lname', 'address', 'phone', 'email', 'resid', 'activityid', 'comments'), $reservationData, $resID);
				
				$this->db->insert('client',$clientData);
				if($this->db->affected_rows() > 0){
					$this->db->select('clientid');
					$this->db->from('client');
					$this->db->order_by("clientid", "desc");
					$this->db->limit(1);
					$query = $this->db->get();
					$clientID = $query->result_array()[0]['clientid'];
					$reswhenData = elements(array('dates', 'activityid', 'clientid'), $reservationData, $clientID);
					
					$this->db->insert('whenn',$reswhenData);

				}
			}

			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
			    $this->db->trans_rollback();
			    return "Error while making reservation. Please try again later.";
			}
			else{
				$this->db->trans_commit();
				return "Reservation successful for ".$reservationData['fname']." ".$reservationData['lname'].".";
			}

		}

		
	}
