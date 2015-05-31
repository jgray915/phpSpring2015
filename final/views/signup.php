<h2>Signup</h2>

<form action="#" method="post">
    <label>Name:</label> <br />
    <input type="text" name="username"/> <br />
    <label>Password:</label> <br />
    <input type="password" name="password"/> <br />
    <label>Re-enter Password:</label> <br />
    <input type="password" name="password2"/> <br />
    <input type="submit" value="Signup" /> 
</form>

<?php
    /*
     * Validate new name and password and create the user
     */
    if($this->util->isPostRequest())
    {
        $info = filter_input_array(INPUT_POST);
        $userDAO = new UserDAO($this->db->getDB());
        
        if(     is_string($info["username"]) && !empty($info["username"]) &&
                is_string($info["password"]) && !empty($info["password"]) &&
                is_string($info["password2"]) && !empty($info["password2"])){
            if ($info["password"] != $info["password2"]){
                echo '<br /> <br /><p class="errorText">Passwords do not match.</p>';
            } 
            else if(!$userDAO->create($info["username"], $info["password"])){
                echo '<br /> <br /><p class="errorText">Username already exists.</p>';
            } 
            else 
            {
                echo '<br /> <br /><p class="successText">Signup complete, <a href="./?view=login">Login here</a>.</p>';
            }
        }
        else{
            echo '<br /> <br /><p class="errorText">Please fill all fields.</p>';
        }
    }
    
?>