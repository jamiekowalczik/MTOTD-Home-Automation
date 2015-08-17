<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="ui.bootstrap.demo">
<head>
	<meta charset="utf-8">
	<title>Welcome to MTOTD</title>

	<script src="/js/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="/js/Mtotd.js"></script>
    <link href="/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

	
	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to MTOTD!</h1>

	<div id="body">
		<div id="sensors">
			sensor 1
			sensor 2
		</div>
		<div id="events">
			event 1
			event 2
		</div>
	</div>

<div ng-controller="AlertDemoCtrl">
  <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
  <button type="button" class='btn btn-default' ng-click="addAlert()">Add Alert</button>
</div>
	
<div ng-controller="AccordionDemoCtrl">
  <p>
    <button type="button" class="btn btn-default btn-sm" ng-click="status.open = !status.open">Toggle last panel</button>
    <button type="button" class="btn btn-default btn-sm" ng-click="status.isFirstDisabled = ! status.isFirstDisabled">Enable / Disable first panel</button>
  </p>

  <div class="checkbox">
    <label>
      <input type="checkbox" ng-model="oneAtATime">
      Open only one at a time
    </label>
  </div>
  <accordion close-others="oneAtATime">
    <accordion-group heading="Static Header, initially expanded" is-open="status.isFirstOpen" is-disabled="status.isFirstDisabled">
      This content is straight in the template.
    </accordion-group>
    <accordion-group heading="{{group.title}}" ng-repeat="group in groups">
      {{group.content}}
    </accordion-group>
    <accordion-group heading="Dynamic Body Content">
      <p>The body of the accordion group grows to fit the contents</p>
        <button type="button" class="btn btn-default btn-sm" ng-click="addItem()">Add Item</button>
        <div ng-repeat="item in items">{{item}}</div>
    </accordion-group>
    <accordion-group is-open="status.open">
        <accordion-heading>
            I can have markup, too! <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open, 'glyphicon-chevron-right': !status.open}"></i>
        </accordion-heading>
        This is just some content to illustrate fancy headings.
    </accordion-group>
  </accordion>
</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
