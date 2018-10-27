<?php

class dab extends CI_Model{
    
    public function __construct(){
        
        $this->load->database();
    }
    
    public function get_yurts($slug = FALSE){
        
        if($slug===FALSE){
            
            $query=$this->db->get('yurts');
            return $query->result_array();
        }
        
        $query=$this->db->get_where('yurts', array('slug'=>$slug));
        return $query->row_array();

    }
    
        public function get_acts($slug = FALSE){
        
        if($slug===FALSE){
            
            $query=$this->db->get('activities');
            return $query->result_array();
        }
        
        $query=$this->db->get_where('activities', array('slug'=>$slug));
        return $query->row_array();

    }
    
public function get_reservation($email){
			$this->db->limit(1);
			$this->db->select('client.clientid,client.fname,client.lname,client.email,
			client.phone,client.address,client.activityid, client.comments, reservationyurt.resid, 
			reservationyurt.packageid,reservationyurt.no_ofnights,reservationyurt.arrival, 
			yurts.cost, yurts.nights AS pNights, yurts.pname,
			CASE WHEN reservationyurt.no_ofnights < 1 THEN DATE_ADD(reservationyurt.arrival, INTERVAL yurts.nights DAY) ELSE 
			DATE_ADD(reservationyurt.arrival, INTERVAL reservationyurt.no_ofnights DAY) END AS depDate, whenn.dates, activities.activityname', FALSE);
			$this->db->from('client');
			$this->db->join('reservationyurt', 'client.resid = reservationyurt.resid');
			$this->db->join('yurts', 'reservationyurt.packageid = yurts.pid');
			$this->db->join('activities', 'client.activityid = activities.activityid');
			$this->db->join('whenn', 'client.clientid = whenn.clientid', 'left');
			$this->db->where('client.email', $email);
			$this->db->order_by("reservationyurt.arrival", "asc");
			$query = $this->db->get();
			return $query->result_array();
		}
}


?>
