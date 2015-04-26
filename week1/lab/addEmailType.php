<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Email Type</title>
</head>
<body>

    <h3>Add Email Type</h3>
    <form action="#" method="post">
        <label>Email Type:</label> 
        <input type="text" name="emailType" value="" placeholder="" />
        <input type="submit" value="Submit" />
    </form>
        
    <?php  
    //init all variables
    $util = new Util();
    $validator = new Validator();
    $emailDB = new EmailTypeDB();
    $emailType = filter_input(INPUT_POST, 'emailType');
    $errors = [];
    
    //validate if post has been made
    if ( $util->isPostRequest() ) {
        if ( !$validator->emailTypeIsValid($emailType) ) {
            $errors[] = 'Email type is not valid';
        }
    }
    
    //display any errors, otherwise save to database
    if ( count($errors) > 0 ) {
        foreach ($errors as $value) {
            echo '<p style="color:red;">',$value,'</p>';
        }
    } 
    else {
        $emailDB->saveEmailType($emailType);
    }
    
    //display saved email types
    $emailDB->displayEmailTypes();
    ?>

</body>
</html>
