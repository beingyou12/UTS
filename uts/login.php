<?php
include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$rand = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);

if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = $_POST['pass'];
    $captcha = $_POST['captcha'];
    $confirmcaptcha = $_POST['confirmcaptcha'];
    

    if ($captcha != $confirmcaptcha) {
        echo "<script>alert('Incorrect Captcha');</script>";
    } else {
        $pass = sha1($pass);
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        // Inside your PHP code, where you have the message
        if ($select_user->rowCount() > 0) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $row['id'];
        header('location: index.php');
        } else {
            $message = 'Incorrect Username or Password!';
            }

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <div class="error-message alert alert-danger">
                <?php
                if (isset($message)) {
                    echo '<p class="error-text">' . $message . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

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
