<?php
//database settings
session_start();
$a=$_SESSION["user"];
$c = mysql_connect('localhost','jyccovov','Murious@@12');
	$s = mysql_select_db('jyccovov_yp',$c);
$sql="select * from `authen` where username='$a' ";
//$data = array();
$rs = mysql_query($sql,$c);

while ($row = mysql_fetch_assoc($rs)) {
  $data = $row['name'];
}

$_SESSION["name"]=$data;
	//print_r($data);
    
?>



<!DOCTYPE html>
<html>
   <head>
	<title>ToDo list</title>
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700'>
	<link rel='stylesheet prefetch' href='https://raubarrera.neocities.org/cdpn/style.css'>
	<link rel="stylesheet" href="css/style.css">

      <style>
       
         .default {
            background: #cedc98;
            border: 1px solid #DDDDDD;
            color: #333333;
         }
      </style>
      
      <script>
         $(function() {
            $( "#sortable-1" ).sortable();
         });
		 
      </script>
   </head>
   
   <body style="margin-left:31%;background-color:darkseagreen;">
     

 <div ng-app="myShoppingList" ng-cloak ng-controller="myCtrl" class="w3-card-2 w3-margin" style="max-width:400px;background-color: cadetblue;">

    <div class="select"> 
	 <select  ng-model="abc" ng-options="x.category for x in cate" >
	 <option value="">Filter:ALL</option> 
	 </select>
	</div> 
	 


  <header class="w3-container w3-light-grey w3-padding-16" style="background-color: paleturquoise;">
  <p> Hi <?php echo $_SESSION["name"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://todo.jyc.co.in/logout.php">Logout</a> </p> 
    <h3>Your To-Do list : {{abc.category}}</h3>
	<h6> Drag the list to sort</h6>
	
  </header>
  
  <ul class="w3-ul">
	 <ul id = "sortable-1">
    <li ng-repeat="x in data | filter: { Category: abc.category }" class="w3-padding-16">{{x.Work}} | {{x.date}}<span ng-click="removeItem(x.Work)" style="cursor:pointer;" class="w3-right w3-margin-right">x</span></li>
  </ul>
  </ul>
  <div class="w3-container w3-light-grey w3-padding-16">
    <div class="w3-row w3-margin-top">
      <div class="w3-col s10">
        <input placeholder="Add work Here" ng-model="addMe" class="w3-input w3-border w3-padding">
      </div>
      <div class="w3-col s2">
        <button ng-click="addItem()" class="w3-btn w3-padding w3-blue" style="background-color:#2c3e50">Add</button>
      </div>
	  
	 
	 
    </div>
    <p class="w3-text-red">{{errortext}}</p>
  </div>
   <div class="select"> 
	   <select  ng-model="abcd" ng-options="x.category for x in cate" >
	 <option value="" selected disabled hidden>Select Category to Insert To-Do</option> 
	 </select>
	 </div>
  
</div>
	
      </ul>




</body>
</html>
<script>
		 var app = angular.module("myShoppingList", []); 
app.controller("myCtrl", function($scope,$http) {
		$http.get("select.php")
		.success(function(data){
			$scope.data=data
			abc=$scope.data;
			//console.log(size(abc.Data) );
			console.log($scope.data);			
		})
	
	$scope.removeItem=function(item){
		 console.log(item); 
		 $http.post("delete.php",{'id':item})
		.success(function(){
			$http.get("select.php")
		.success(function(data){
			$scope.data=data
			console.log($scope.data);		
		})		
		})
		}
		
	$scope.addItem=function(){
		console.log($scope.addMe);
		console.log($scope.abcd.category);
		 $http.post("insert.php",{'id':$scope.addMe,'cat':$scope.abcd.category})
		.success(function(){
			$http.get("select.php")
		.success(function(data){
			$scope.data=data
			console.log($scope.data);		
		})		
		})
}	
		
  $scope.cate = [
        {category : "Home"},
        {category : "Office"},
        {category : "Others"}
    ];
});
</script>
