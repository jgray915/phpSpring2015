<?php
   if ( $util->isPostRequest() ) {
       $db = new DB($dbConfig); 
       $signupDao = new SignupDAO($db->getDB());            

       $info = filter_input_array(INPUT_POST);

       if ( $signupDao->login($info["username"], $info["password"]) ) {
           echo '<h2>Login Sucess</h2>';

       } else {
           echo '<h2>Login Failed</h2>';
       }
   }
?>

<h2>Login</h2>

<form action="#" method="post">
    <label>Name:</label> <br />
    <input type="text" name="username"/> <br />
    <label>Password:</label> <br />
    <input type="password" name="password"/> <br />
    <input type="submit" value="Login" />
</form>