<?php
session_start();
require_once("includes/db_connect.php");
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $id=$_POST['admin_id'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="UPDATE  admin SET name='$name',email='$email',password='$password' WHERE admin_id='$id'";
global $connection;
$results=mysqli_query($connection,$sql);
if($results){ 
 header("Location: index.php");
    
} else {
 echo "Not Edit";
 header("Location:edit_profile.php");
}
}

?>
<!DOCTYPE html>
<html>
<head>
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
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  background-color: #3c8dbc;
}
.form button:hover,.form button:active,.form button:focus {
    background-color: #3c8dbc;
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
    background-color: #3c8dbc;
                   
}
</style>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>
<body>
<div class="login-page">
  <div class="form">
<?php
$id=$_GET['id'];
$sql="SELECT * FROM admin WHERE admin_id='$id'";
$res=mysqli_query($connection,$sql);
foreach($res as $row)
?>
    <form class="login-form"  action="" method="post">
    <input type="hidden" name="admin_id" placeholder="Name" value="<?php echo $row['admin_id'] ?>" required>
    <input type="text" name="name" placeholder="Name" value="<?php echo $row['name'] ?>" required>
      <input type="email" name="email" placeholder="Email" value="<?php echo $row['email'] ?>" required>
      <input type="password" name="password"  placeholder="password" value="<?php echo $row['password'] ?>" required>
      <button type="submit" name="submit">login</button>
    </form>

  </div>
</div>

</body>
</html>
