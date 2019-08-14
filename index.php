<?php
include("validate.php");
   $errors= [];
   if(isset($_POST['signup_btn'])){
    $errors = validateUser($_POST, ['signup_btn']);
    if(empty($errors)){
        echo "ready for the database";
    }
   }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="index.php" method="post" class="form-control">
    <div class="form-intro">
        <span class="text-position">Sign Up</span>
    </div>
     <div class="form-space">
         <div class = "<?php echo isset($errors['username']) ? 'has-error' : ''?>">
            <label for="username" class="label-feild">Username</label><br>
            <input type="text" name="username" value="" class="form-lg" ><br>
                <?php if (isset($errors['username'])): ?>
                <span class="help-block"><?php echo $errors['username'] ;?></span>
                <?php endif; ?>
        </div>
        <div class = "<?php echo isset($errors['email']) ? 'has-error' : ''?>">
            <label for="email" class="label-feild">Email</label><br>
            <input type="text" name="email" id="email" class="form-lg"><br>
            <?php if (isset($errors['email'])): ?>
                <span class="help-block"><?php echo $errors['email'] ;?></span>
            <?php endif; ?>
        </div>
        <div class = "<?php echo isset($errors['password']) ? 'has-error' : ''?>">
            <label for="password" class="label-feild">Password</label><br>
             <input type="password" name="password" id="" class="form-lg"><br>
             <?php if (isset($errors['password'])): ?>
                <span class="help-block"><?php echo $errors['password'] ;?></span>
            <?php endif; ?>
        </div>
        <div class = "<?php echo isset($errors['passwordCof']) ? 'has-error' : ''?>">
             <label for="PasswordCof" class="label-feild">Password Confirmation</label><br>
             <input type="password" name="passwordCof" id="" class="form-lg"><br>
             <?php if (isset($errors['passwordCof'])): ?>
                <span class="help-block"><?php echo $errors['passwordCof'] ;?></span>
            <?php endif; ?>
        </div>
             <input type="submit" value="Register" class="signup_btn" name="signup_btn">
     </div>
    </form>
    </div>
</body>
</html>
