<?php

    if($util->isPostRequest())
    {

        $db = new DB($dbConfig);
        $info = filter_input_array(INPUT_POST);
        $signupDao = new SignupDAO($db->getDB());
        if ($info["password"] === $info["password2"] && $signupDao->create($info["username"], $info["password"])) 
        {
            $submitMsg = '<br /> <br /><p>Signup complete, <a href="./?view=login">Login here</a>.</p>';
        } 
        else 
        {
            $submitMsg = '<br /> <br /><p>Signup Failed, <a href="./?view=signup">Try Again</a></p>';
        }
    }

?>

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

<?php if(isset($submitMsg)) echo $submitMsg; ?>

