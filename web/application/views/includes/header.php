<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>MTOTD Home Automation System</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">MTOTD Home Automation System</a>
	      <ul class="nav">
	        <li class="dropdown">
	           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sensors <b class="caret"></b></a>
	           <ul class="dropdown-menu">
	              <li <?php if($this->uri->segment(2) == 'zones'){echo 'class="active"';}?>>
	                 <a href="<?php echo base_url(); ?>admin/zones">Zones</a>
	              </li>
	              <li <?php if($this->uri->segment(2) == 'sensortype'){echo 'class="active"';}?>>
	                 <a href="<?php echo base_url(); ?>admin/sensortype">Sensor Types</a>
	              </li>
	              <li <?php if($this->uri->segment(2) == 'sensors'){echo 'class="active"';}?>>
	                 <a href="<?php echo base_url(); ?>admin/sensors">Sensors</a>
	              </li>
	              <li <?php if($this->uri->segment(2) == 'sensorobjects'){echo 'class="active"';}?>>
	                 <a href="<?php echo base_url(); ?>admin/sensorobjects">Sensor Objects</a>
	              </li>
	           </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tasks <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	             <li <?php if($this->uri->segment(2) == 'scheduledtasks'){echo 'class="active"';}?>>
	                <a href="<?php echo base_url(); ?>admin/scheduledtasks">Scheduled Tasks</a>
	             </li>
	             <li <?php if($this->uri->segment(2) == 'triggeredtasks'){echo 'class="active"';}?>>
	                <a href="<?php echo base_url(); ?>admin/triggeredtasks">Triggered Tasks</a>
	             </li>
	           </ul>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'events'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/events">Events</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
