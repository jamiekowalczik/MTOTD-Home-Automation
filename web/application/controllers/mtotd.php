<?php

class Mtotd extends CI_Controller {

	/**
	 * Responsable for auto load the model
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('grid_model');
		if(!$this->session->userdata('is_logged_in')){
			redirect('user/login');
		}
	}
	
    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		if($this->session->userdata('is_logged_in')){
			
			try{
				$sensortypesgrid = $this->_displaySensorTypesGrid();
				$data['headertxt'] = $sensortypesgrid['grid-js'];
				//$data['sensortypesgridhtml'] = $sensortypesgrid['grid-html'];
				
				$sensorsgrid = $this->_displaySensorsGrid();
				$data['headertxt'] .= $sensorsgrid['grid-js'];
				//$data['sensorsgridhtml'] = $sensorsgrid['grid-html'];
				
				$sensorobjectsgrid = $this->_displaySensorObjectsGrid();
				$data['headertxt'] .= $sensorobjectsgrid['grid-js'];
				//$data['sensorsgridhtml'] = $sensorsgrid['grid-html'];
				
				$tasksgrid = $this->_displayTasksGrid();
				$data['headertxt'] .= $tasksgrid['grid-js'];
				//$data['sensorsgridhtml'] = $sensorsgrid['grid-html'];
			}catch(Exception $e){
				echo $e->getMessage();
			}
			
	        //load the view
	        $data['main_content'] = 'admin/admin';
	        $this->load->view('includes/template', $data);  
			
        }else{
        	$this->load->view('admin/login');	
        }
	}
	
	function _displaySensorTypesGrid(){
	
		$this->grid_model->newgrid();
		$gridName = "jqgrid-ci-sensortypes";
		 
		$this->grid_model->setGridName($gridName);
		$this->grid_model->setDatatype("json");
		$this->grid_model->setHiddengrid("true");
		$this->grid_model->setRowNum(20);
		$this->grid_model->setUrl("/mtotd/getSensorTypesJson");
		$this->grid_model->setHideCol("['id']");
		$this->grid_model->setColNames("['ID', 'Name']");
		$this->grid_model->setColModel("
                        [
                                        {name:'id',index:'id', width:40},
                                        {name:'name',index:'name', width:60, editable:true}
                                ]
                ");
		$this->grid_model->setSortname("name");
		$this->grid_model->setSortorder("desc");
		$this->grid_model->setCaption("Sensor Types");
		$this->grid_model->setPagerOptions("add:true,del:true,search:true");
		$this->grid_model->setWidth(600);
		$this->grid_model->setHeight("auto");
		$ondblClickRow=
		<<<DOC
                $('#$gridName').editGridRow( id, {reloadAfterSubmit:true});
                //$('#tr_default_vlan').show();
                //$('#tr_restart_now').show();
                //$('#tr_shutdown').show();
                //$('#tr_auth_profile').show();
                //$('#name').attr('readonly','readonly');
DOC;
		$this->grid_model->setOnDblClickRow($ondblClickRow);
	
		$grid = $this->grid_model->displayGrid();
		return $grid;
	}
	
	function _displaySensorsGrid(){
	
		$sensortypeStr = "0:;";
		$sql = "SELECT id,name FROM sensortype ORDER BY name asc";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row){
			$sensortypeStr .= $row->id.":".$row->name.";";
		}
		$sensortypeStr = substr_replace($sensortypeStr,"",-1);
		
		$this->grid_model->newgrid();
		$gridName = "jqgrid-ci-sensors";
			
		$this->grid_model->setGridName($gridName);
		$this->grid_model->setDatatype("json");
		$this->grid_model->setHiddengrid("true");
		$this->grid_model->setRowNum(20);
		$this->grid_model->setUrl("/mtotd/getSensorsJson");
		$this->grid_model->setHideCol("['id']");
		$this->grid_model->setColNames("['ID', 'Name', 'Description', 'Sensor Type', 'IP Address' ]");
		$this->grid_model->setColModel("
                        [
                                        {name:'id',index:'id', width:40},
                                        {name:'name',index:'name', width:60, editable:true},
										{name:'description',index:'description', width:60, editable:true},
										{name:'sensortype_id',index:'sensortype_id', width:60, editable:true, edittype:'select', editoptions:{value:'$sensortypeStr'}},
										{name:'ipaddress',index:'ipaddress', width:60, editable:true}
                                ]
                ");
		$this->grid_model->setSortname("name");
		$this->grid_model->setSortorder("desc");
		$this->grid_model->setCaption("Sensors");
		$this->grid_model->setPagerOptions("add:true,del:true,search:true");
		$this->grid_model->setWidth(600);
		$this->grid_model->setHeight("auto");
		$ondblClickRow=
		<<<DOC
                $('#$gridName').editGridRow( id, {reloadAfterSubmit:true});
                //$('#tr_default_vlan').show();
                //$('#tr_restart_now').show();
                //$('#tr_shutdown').show();
                //$('#tr_auth_profile').show();
                //$('#name').attr('readonly','readonly');
DOC;
		$this->grid_model->setOnDblClickRow($ondblClickRow);
	
		$grid = $this->grid_model->displayGrid();
		return $grid;
	}
	
	function _displaySensorObjectsGrid(){
	
		$sensorsStr = "0:;";
		$sql = "SELECT id,name FROM sensors ORDER BY name asc";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row){
			$sensorsStr .= $row->id.":".$row->name.";";
		}
		$sensorsStr = substr_replace($sensorsStr,"",-1);
		
		$this->grid_model->newgrid();
		$gridName = "jqgrid-ci-sensorobjects";
			
		$this->grid_model->setGridName($gridName);
		$this->grid_model->setDatatype("json");
		$this->grid_model->setHiddengrid("true");
		$this->grid_model->setRowNum(20);
		$this->grid_model->setUrl("/mtotd/getSensorObjectsJson");
		$this->grid_model->setHideCol("['id']");
		$this->grid_model->setColNames("['ID', 'Sensor', 'Sensor Pin', 'Name', 'Description', 'Misc' ]");
		$this->grid_model->setColModel("
                        [
                                        {name:'id',index:'id', width:40},
                                        {name:'sensor_id',index:'sensor_id', width:60, editable:true, edittype:'select', editoptions:{value:'$sensorsStr'}},
										{name:'sensor_pin',index:'sensor_pin', width:60, editable:true},
										{name:'name',index:'name', width:60, editable:true},
										{name:'description',index:'description', width:60, editable:true},
										{name:'misc',index:'misc', width:60, editable:true}
                                ]
                ");
		$this->grid_model->setSortname("name");
		$this->grid_model->setSortorder("desc");
		$this->grid_model->setCaption("Sensor Objects");
		$this->grid_model->setPagerOptions("add:true,del:true,search:true");
		$this->grid_model->setWidth(600);
		$this->grid_model->setHeight("auto");
		$ondblClickRow=
		<<<DOC
                $('#$gridName').editGridRow( id, {reloadAfterSubmit:true});
                //$('#tr_default_vlan').show();
                //$('#tr_restart_now').show();
                //$('#tr_shutdown').show();
                //$('#tr_auth_profile').show();
                //$('#name').attr('readonly','readonly');
DOC;
		$this->grid_model->setOnDblClickRow($ondblClickRow);
	
		$grid = $this->grid_model->displayGrid();
		return $grid;
	}
	
	function _displayTasksGrid(){
	
		$sensorobjectsStr = "0:;";
		$sql = "SELECT id,name FROM sensorobjects ORDER BY name asc";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row){
			$sensorobjectsStr .= $row->id.":".$row->name.";";
		}
		$sensorobjectsStr = substr_replace($sensorobjectsStr,"",-1);
	
		$this->grid_model->newgrid();
		$gridName = "jqgrid-ci-scheduledEvents";
			
		$this->grid_model->setGridName($gridName);
		$this->grid_model->setDatatype("json");
		$this->grid_model->setHiddengrid("true");
		$this->grid_model->setRowNum(20);
		$this->grid_model->setUrl("/mtotd/getScheduledEventsJson");
		$this->grid_model->setHideCol("['id']");
		$this->grid_model->setColNames("['ID', 'Name', 'Description', 'Day of Week', 'Month', 'Day of Month', 'Hour', 'Minute', 'Sensor Object', 'Value' ]");
		$this->grid_model->setColModel("
				[
				{name:'id',index:'id', width:40},
				{name:'name',index:'name', width:60, editable:true},
				{name:'description',index:'description', width:60, editable:true},
				{name:'dow',index:'dow', width:60, editable:true},
				{name:'month',index:'month', width:60, editable:true},
				{name:'dom',index:'dom', width:60, editable:true},
				{name:'hour',index:'hour', width:60, editable:true},
				{name:'min',index:'min', width:60, editable:true},
				{name:'sensorobject_id',index:'sensorobject_id', width:60, editable:true, edittype:'select', editoptions:{value:'$sensorobjectsStr'}},
				{name:'sensorobject_value',index:'misc', width:60, editable:true}
		]
				");
		$this->grid_model->setSortname("name");
		$this->grid_model->setSortorder("desc");
		$this->grid_model->setCaption("Scheduled Events");
		$this->grid_model->setPagerOptions("add:true,del:true,search:true");
		$this->grid_model->setWidth(600);
		$this->grid_model->setHeight("auto");
		$ondblClickRow=
		<<<DOC
                $('#$gridName').editGridRow( id, {reloadAfterSubmit:true});
                //$('#tr_default_vlan').show();
                //$('#tr_restart_now').show();
                //$('#tr_shutdown').show();
                //$('#tr_auth_profile').show();
                //$('#name').attr('readonly','readonly');
DOC;
		$this->grid_model->setOnDblClickRow($ondblClickRow);
	
		$grid = $this->grid_model->displayGrid();
		return $grid;
	}
	
	function getSensorTypesJson(){
		try{
			$arrColumns = array(
					"id"=>"id"
					,"name"=>"name"
			);
			$arrReplaceColumns = array(
					// column in table to replace value of, table with foreign key relationship,
					// foreign key column, column with value to replace from
					// Note: Add appropriate script to js_php page.
					//"location,location,id,name"
					//,"vlan_id,vlan,id,vlan_description"
			);
			return $this->grid_model->getJsonCustom("sensortype","id",$arrColumns,$arrReplaceColumns);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	function getSensorsJson(){
		try{
			$arrColumns = array(
					"id"=>"id"
					,"name"=>"name"
					,"description"=>"description"
					,"sensortype_id"=>"sensortype_id"
					,"ipaddress"=>"ipaddress"
			);
			$arrReplaceColumns = array(
					// column in table to replace value of, table with foreign key relationship,
					// foreign key column, column with value to replace from
					// Note: Add appropriate script to js_php page.
					"sensortype_id,sensortype,id,name"
					//,"vlan_id,vlan,id,vlan_description"
			);
			return $this->grid_model->getJsonCustom("sensors","id",$arrColumns,$arrReplaceColumns);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	function getSensorObjectsJson(){
		try{
			$arrColumns = array(
					"id"=>"id"
					,"sensor_id"=>"sensor_id"
					,"sensor_pin"=>"sensor_pin"
					,"name"=>"name"
					,"description"=>"description"
					,"misc"=>"misc"
			);
			$arrReplaceColumns = array(
					// column in table to replace value of, table with foreign key relationship,
					// foreign key column, column with value to replace from
					// Note: Add appropriate script to js_php page.
					"sensor_id,sensors,id,name"
					//,"vlan_id,vlan,id,vlan_description"
			);
			return $this->grid_model->getJsonCustom("sensorobjects","id",$arrColumns,$arrReplaceColumns);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	function getScheduledEventsJson(){
		try{
			$arrColumns = array(
					"id"=>"id"
					,"name"=>"name"
					,"description"=>"description"
					,"dow"=>"dow"
					,"month"=>"month"
					,"dom"=>"dom"
					,"hour"=>"hour"
					,"min"=>"min"
					,"sensorobject_id"=>"sensorobject_id"
					,"sensorobject_value"=>"sensorobject_value"
			);
			$arrReplaceColumns = array(
					// column in table to replace value of, table with foreign key relationship,
					// foreign key column, column with value to replace from
					// Note: Add appropriate script to js_php page.
					"sensorobject_id,sensorobjects,id,name"
					//,"vlan_id,vlan,id,vlan_description"
			);
			return $this->grid_model->getJsonCustom("scheduledevents","id",$arrColumns,$arrReplaceColumns);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}