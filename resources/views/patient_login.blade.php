<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
	body {
		font-family: Arial, Helvetica, sans-serif;
		background-size: cover;
		position: relative;
		background: #239CB7;

	}
		input[type=number], input[type=number] {
			width: 100%;
		  	padding: 12px 20px;
		  	margin: 8px 0;
		  	display: inline-block;
		  	border: 1px solid #ccc;
		  	box-sizing: border-box;
			border-radius: 30px;
		  }
		  button {
			background: #A8ADD9;

		  	color: white;
		  	padding: 14px 20px;
		  	margin: 8px 0;
		  	border:none;
		  	cursor: pointer;
		  	width: 30%;
			position: relative;
			left: 35%;
			border-radius: 50px;
		  }
		  button:hover {
		  	opacity: 0.8;
		  }
		  .container {
		  	padding: 16px;
		  }
		  .modal {
		  	display: none;
		  	position: fixed;
		  	z-index: 1;
		  	left: 0;
		  	top: 0;
		  	width: 100%;
		  	height: 100%;
		  	overflow: auto;
		  	color: purple;
		  	background-color: rgb(0,0,0);
		  	background-color: rgba(0,0,0,0.4);
		  	padding-top: 60px;
		  }
		  .modal-content {
			background: #228297;

		  	margin: 5% auto 15% auto;
		  	border: 1px solid #888;
		 	width: 30%;

		 }
		  .animate {
		  	-webkit-animation: animatezoom 0.8s;
		  	animation: animatezoom 0.5s
		  }
		  @-webkit-keyframes animatezoom {
		  	from {-webkit-transform: scale(0)}
		  	to {-webkit-transform: scale(1)}
		  }
		  @keyframes animatezoom {
		  	from {transform: scale(0)}
		  	to {transform: scale(1)}
		  }
		  h3{
		  	text-align: center;
		  	color: black;
			  font-family: sans-serif;
			  font-size: 20px;
		  }
</style>
</head>
<body onload="document.getElementById('id01').style.display='block'" style="width:auto;">
	<div id="id01" class="modal">
		<form class="modal-content animate" name="Login" action="Patient" onsubmit="return(validate())">
			<h3>Login<br>Enter login credential</h3>
			<div class="container">
				<!-- <label for="aadhar no"><b>Aadhar number</b></label> -->
				<input type="number" placeholder="Enter your aadhar no." name="uname" required><br><br>
				<!-- <label for="passwd"><b>Mobile number</b></label> -->
				<input type="number" placeholder="Enter your mobile no." name="passwd" required><br><br>
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				backdrop:'static';
				keyboard:false;
			}
		}
	</script>
</body>
</html>
