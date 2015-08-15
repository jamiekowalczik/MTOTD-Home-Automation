<?php
class Sensors_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get sensor by his is
    * @param int $sensor_id 
    * @return array
    */
    public function get_sensor_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('sensors');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Fetch sensors data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_sensors($sensortype_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('sensors.id');
		$this->db->select('sensors.name');
		$this->db->select('sensors.description');
		$this->db->select('sensors.sensortype_id');
		$this->db->select('sensortype.name as sensortype_name');
		$this->db->from('sensors');
		if($sensortype_id != null && $sensortype_id != 0){
			$this->db->where('sensortype_id', $sensortype_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}

		$this->db->join('sensortype', 'sensors.sensortype_id = sensortype.id', 'left');

		$this->db->group_by('sensors.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}


		$this->db->limit($limit_start, $limit_end);

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $sensortype_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_sensors($sensortype_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('sensors');
		if($sensortype_id != null && $sensortype_id != 0){
			$this->db->where('sensortype_id', $sensortype_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_sensor($data)
    {
		$insert = $this->db->insert('sensors', $data);
	    return $insert;
	}

    /**
    * Update sensor
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_sensor($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('sensors', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete sensor
    * @param int $id - sensor id
    * @return boolean
    */
	function delete_sensor($id){
		$this->db->where('id', $id);
		$this->db->delete('sensors'); 
	}
 
}
?>	
