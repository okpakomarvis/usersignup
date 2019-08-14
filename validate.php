<?php
//echo "list of Items : <pre>",print_r($_POST) , "</pre>";

function validateUser($user, $ignoreField){
    $errors =[];
    $username= $email= $password= $passwordCof= "";
    $username = $user['username'];
    $email = $user['email'];
    $password = $user['password'];

    function security($sanitize){
        global $errors;
        $sanitize = htmlspecialchars($sanitize);
        $result = stripslashes($sanitize);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$result)) {
            //$errors['username'] = " Only letters, num and white space allowed"; 
            return;
        }
        return $result;

    }
    if(isset($user['username']) && !empty($username)){
        // validate security
        $check = security($username);
        if(empty($check)){
            $errors['username'] = "Only letters and num are allowed";
        }
        echo "result :".$check;
        //check if the username exist in the database
        // if it exist return user already exist 

    }
    if (isset($user['email']) && !empty($email)){
        //check for security
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format"; 
          }
          //check in databese if email already exist
    }
    if(isset($user['passwordCof']) && $password !== $user['passwordCof'] ){
        //check password match
        $errors['passwordCof'] = "Password do not match";
        //check lenghth
        if(count($password) <= 3){
            $errors['password'] = "Password must be more than 3";   
        }
        //check security
        $checkpass = security($password);
        if(empty($checkpass)){
            $errors['password'] = "Password must be letters and num only";
        }
        // hassh password
        // submit password

    }
   
   // required validation
    foreach ($user as $key => $value) {
        if (in_array($key, $ignoreField)) {
        continue;
        }
            if (empty($user[$key])) {
                $errors[$key] = "This field is required";
            }
        }
        return $errors;
}

?>