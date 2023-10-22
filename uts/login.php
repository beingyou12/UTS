<?php
include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   $rand = substr(uniqid(), 5);
   $captcha = $_POST['captcha'];
   $confirmcaptcha = $_POST['confirmcaptcha'];

   if($captcha != $confirmcaptcha) {
      echo "<script> alert('Incorrect Captcha'); </script>";
   }else if($select_user->rowCount() > 0) {
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'Incorrect Username or Password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>

<section class="form-container">
   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="Enter Your Email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Enter Your Password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <label for="captcha">Captcha Code</label>
      <div id="captcha"><?php echo $rand; ?></div>
      <input type="text" class="box" name="captcha" placeholder="Captcha" required data-parsley-trigger="keyup">
      <input type="hidden" name="confirmcaptcha" value="<?php echo $rand; ?>">
      <input type="submit" value="login now" name="submit" class="btn">
      <p>Don't have an account? <a href="register.php">Register Now</a></p>
   </form>
</section>

<?php include 'components/footer.php'; ?> 

<script src="js/script.js"></script>
</body>
</html>