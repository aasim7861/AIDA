<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!DOCTYPE html>
<html lang="en-UK" ng-app="myApp">
<head>
   
<!-- Display the Table and the Form --> 
<div class="one-thirds column">
    <div id="right" id="right">
      <div class="two-thirds column">
	
<style>
table, th , td  {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd)	{
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>

		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>

<body>
<h2>AngularJS HTTP/MySQL/JSON and Search Filters</h2>
<p>
This information is feeding from my database using the JSON query. This outputs as JSON and then displayed using an AngularJS controller. The results can be filtered by the entries in the search box.
</p>	
<div  ng-controller="custCtrl"> 
Search:<input ng-model = "query" type="text">
<br />
<br />
<table>
  <tr ng-repeat="customer in customers | filter:query">
    <td>{{ customer.First }}</td>
    <td>{{ customer.Surname }}</td>
    <td>{{ customer.Email }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('custCtrl', function($scope, $http) {
  
     $http.get("http://zilmat.com/int/support/interfaceframeworks/examples/searchcust.php")
    .success(function(response) {$scope.customers = response.records;});
});
</script>

      </div>
    </div>
  </div>
</body>
</html>
<?php require 'includes/footer.php'; ?>