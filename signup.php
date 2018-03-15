<?php

$c = mysql_connect('localhost','jyccovov','Murious@@12');
	$s = mysql_select_db('jyccovov_yp',$c);

if(isset($_POST['submit'])){

  $a0  =$_POST['name'];	
  $a1 = $_POST['username'];
  $a2 = $_POST['email'];	
  $a3 = $_POST['passcode'];	
  $sql = " select * from authen where email='$a2'";

     $result=mysql_query($sql,$c);
	if(mysql_num_rows($result)== 1	)
		{	
						 $message = "You are already registered or some problem occured.";
						echo "<script type='text/javascript'>alert('$message');</script>";
					//$_SESSION["user"]=$a1;
				//header("Location: http://localhost:8081/todo/todo.html");


		}

		else
		{
			
			mysql_query("CREATE TABLE `$a1`(Work varchar(255),Category varchar(255),date varchar(255))",$c);
			$result1=mysql_query("INSERT INTO `authen` (`name`,`username`, `passcode`,`email`) VALUES ('$a0','$a1','$a3','$a2')",$c);
			$message = "You have succesfully registered.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>setTimeout(\"location.href = 'http://todo.jyc.co.in';\",500);</script>";
		}

}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
<title>My ToDo</title>
	
</head>

<script>
new WOW().init();
</script>

<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}					 
</style>

	<body>
	<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name" />
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form"   method="post" action="#">
    	<input type="text" placeholder="name"  id="name" name="name"/>	
      <input type="text" placeholder="Username"  id="username" name="username"/>
      <input type="text" placeholder="Email"  id="email" name="email"/>
      <input type="password" placeholder="Password" id="Duration" name="passcode"/>
      <button name="submit" type="submit">Submit</button>
    </form>
  </div>
</div>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
	</body>



      
   
      


