<h2>Login</h2>

<form action="#" method="post">
    <label>Name:</label> <br />
    <input type="text" name="username"/> <br />
    <label>Password:</label> <br />
    <input type="password" name="password"/> <br />
    <input type="submit" value="Login" />
</form>

<?php
    /*
    * Authenticate user
    */
   if ( $this->util->isPostRequest() ) {
        $userDao = new UserDAO($this->db->getDB());   
        $info = filter_input_array(INPUT_POST);
       
        if(     is_string($info["username"]) && !empty($info["username"]) &&
                is_string($info["password"]) && !empty($info["password"])){
            if ( $userDao->login($info["username"], $info["password"]) ) {
                $this->util->redirect('?view=monthly');
            } else {
                echo '<p class="errorText">Name/password combination failed.</p>';
            }
        }
        else{
            echo '<p class="errorText">Please fill in all fields.</p>';
        }
   }
   
?>