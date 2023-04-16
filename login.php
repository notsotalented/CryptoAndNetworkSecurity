<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: "lucida console", "arial", monospace;
}

form {border: 0px solid #f1f1f1;

}

.container input[type=text], .container input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.container button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-family: "lucida console", "arial", monospace;
}

.container button:hover {
  opacity: 0.8;
}

.container .cancelbtn {
  width: 20%;
  padding: 10px 18px;
  background-color: #f44336;
}

.container {
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 10x;
  text-decoration: none;
}
span.psw:visited {
}

#back {
  padding: 2px;
  padding-left: 9px;
  width: 86%;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

</style>
</head>
<body>

<form action="login_processing.php" method="post">

  <div class="container">
    <label for="username"><b>Email address</b></label>
    <input type="text" placeholder="jamesbond007@sis.gov.uk" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Vesper Lynn" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <span class="psw">Forgot <a style="color:orange;text-decoration-line: none;" id="forget" href="/index.php?page=forget">password?</a></span>
  </div>

  <div id = "back" class="container" style="background-color:#f1f1f1">
    <button onclick="location.href='/index.php'" type="button" class="cancelbtn">Back to Home</button>
  </div>
</form>

</body>
</html>
