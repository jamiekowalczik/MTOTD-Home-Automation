<!DOCTYPE html> 
<html lang="en-US">
<head>
	<title>MTOTD Home Automation System</title>
	<meta charset="utf-8">
	<link href="/assets/css/admin/global.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
	<!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->	
	<script type="text/javascript" src="/assets/js/grid.locale-en.js "></script>
	<script type="text/javascript" src="/assets/js/jquery.jqGrid.min.js "></script>
	
	<link rel="stylesheet" type="text/css" href="/assets/css/redmond/jquery-ui.custom.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/ui.jqgrid.css" />
	
	<script src="/assets/js/ui.datepicker.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/ui.datepicker.css" />
	
	<script src="/assets/js/jquery.contextMenu.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/jquery.contextMenu.css" />

	<script type="text/javascript">
			$(document).ready(function() {
				<?=$headertxt;?>
			});
		</script>

</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">MTOTD Home Automation System</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'admin'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>mtotd/index">Admin</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>user/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
