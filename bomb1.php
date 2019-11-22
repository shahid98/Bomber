<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style> 
#main {
align-self: center;
}
div.input-container {
	//margin : 0 auto;
	align-self: center;
}
input[type="text"] {
             align-self: center;
            /* margin : 0 auto;*/
        }
	input[type="password"] {
         //    display: block;
         //    margin : 0 auto;
		 align-self: center;
        }
body {
  background-color: white;
}

* {box-sizing: border-box;}

/* Style the input container */
.input-container {
align-self: center;
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

/* Style the form icons */
.icon {
align-self: center;
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 100px;
  text-align: center;
}

/* Style the input fields */
.input-field {
	text-align:center;
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {align-self: center;
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
h1 {
	text-align: center;
	color: Green;
}

</style>

<body>
<h1>BOMBER</h1>
 <form action="bomb_final.php"  method="post">
  
  <div class="input-container" id="main">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="NUMBER WITHOUT +91" name="ph">
  </div>

  <div class="input-container" id="main">
    <i class="fa fa-clock-o icon"></i>
    <input class="input-field" type="text" placeholder="TIMES" name="count" max="150">
  </div>

  <button type="submit" class="btn">Start</button>

</form> 

<h5>NOTE: LIMITED TO 150 MESSAGE PER NUMBER AND 2 SECOND GAP BETWEEN EACH MESSAGE  </h5>
</body>
</html>
