<?php
class Sensorobjects_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get sensorobjet by his id
    * @param int $sensorobject_id 
    * @return array
    */
    public function get_sensorobject_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('sensorobjects');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Fetch sensorobjects data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_sensorobjects($sensor_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('sensorobjects.id');
		$this->db->select('sensorobjects.name');
		$this->db->select('sensorobjects.description');
		$this->db->select('sensorobjects.sensor_id');
		$this->db->select('sensors.name as sensor_name');
		$this->db->select('sensorobjects.sensor_pin');
		$this->db->select('sensorobjects.misc');
		$this->db->from('sensorobjects');
		if($sensor_id != null && $sensor_id != 0){
			$this->db->where('sensor_id', $sensor_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}

		$this->db->join('sensors', 'sensorobjects.sensor_id = sensors.id', 'left');

		$this->db->group_by('sensorobjects.id');

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
    * @param int $sensor_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_sensorobjects($sensor_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('sensorobjects');
		if($sensor_id != null && $sensor_id != 0){
			$this->db->where('sensor_id', $sensor_id);
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
    function store_sensorobject($data)
    {
		$insert = $this->db->insert('sensorobjects', $data);
	    return $insert;
	}

    /**
    * Update sensor
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_sensorobject($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('sensorobjects', $data);
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
	function delete_sensorobject($id){
		$this->db->where('id', $id);
		$this->db->delete('sensorobjects'); 
	}
 
}
?>	
