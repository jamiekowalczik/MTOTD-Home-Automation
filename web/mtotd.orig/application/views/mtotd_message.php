<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html ng-app="ui.bootstrap.demo">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.13.3.js"></script>
    <script src="js/Mtotd.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<div ng-controller="AlertDemoCtrl">
  <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
  <button type="button" class='btn btn-default' ng-click="addAlert()">Add Alert</button>
</div>
  </body>
</html>