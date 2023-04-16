<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: "lucida console", "arial", monospace;
}
form {border: 0px solid #f1f1f1;}

.container input[type=text], .container input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.container button {
  background-color: orangered;
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
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
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

<form action="terminate_processing.php" method="post">
  <div class="container">
    <label for="username"><b>Username termination</b></label>
    <input type="text" placeholder="Fill in all correct fields for deletion" name="username" required>

    <label for="password"><b>Confirm password</b></label>
    <input type="password" placeholder="Vesper Lynn" name="password" required>

    <label for="password_r"><b>Confirm password again</b></label>
    <input type="password" placeholder="Vesper Lynn" name="password_r" required>

    <label for="role"><b>Cofirm role</b></label>
    <input type="text" placeholder="Input integer (0: Admin, 1:Vendor, 2:User)" name="role" required>
        
    <button type="submit">Terminate!</button>
  </div>

  <div id="back" class="container" style="background-color:#f1f1f1">
    <button onclick="location.href='/index.php'" type="button" class="cancelbtn">Back to Home</button>
  </div>
</form>

</body>
</html>
