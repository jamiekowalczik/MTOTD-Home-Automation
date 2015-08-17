<?php
class Scheduledevents_model extends CI_Model {
 
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
    public function get_scheduledevent_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('scheduledevent');
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
    public function get_scheduledevents($scheduledevent_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('scheduledevents.id');
		$this->db->select('scheduledevents.name');
		$this->db->select('scheduledevents.description');
		$this->db->select('scheduledevents.sensorobject_id');
		$this->db->select('sensor.name as sensor_name');

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

		if($limit_start && $limit_end){
			$this->db->limit($limit_start, $limit_end);
		}
		
		if($limit_start != null){
			$this->db->limit($limit_start, $limit_end);
		}
		
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
    function count_scheduledevents($sensorobject_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('scheduledevents');
		if($scheduledevent_id != null && $scheduledevent_id != 0){
			$this->db->where('scheduledevent_id', $scheduledevent_id);
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
    function store_scheduledevents($data)
    {
		$insert = $this->db->insert('scheduledevents', $data);
	    return $insert;
	}

    /**
    * Update sensor
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_scheduledevents($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('scheduledevents', $data);
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
	function delete_scheduledevent($id){
		$this->db->where('id', $id);
		$this->db->delete('scheduledevent'); 
	}
 
}
?>	
