<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );

        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
       
        $emailType = filter_input(INPUT_POST, 'emailtype');
        $email = filter_input(INPUT_POST, 'email');
        $active = filter_input(INPUT_POST, 'active');
        $emailtypeid = filter_input(INPUT_POST, 'emailtypeid');
        $emaileid = filter_input(INPUT_POST, 'emailid');
        
        $util = new Util();
        $validator = new Validator();
        $emailTypeDAO = new EmailTypeDAO($db);
        $emailDAO = new EmailDAO($db);
        
        $emailtypeModel = new EmailTypeModel();
        $emailtypeModel->setActive($active);
        $emailtypeModel->setEmailtype($emailType);

        $emailModel = new EmailModel();
        $emailModel->setActive($active);
        $emailModel->setEmail($email);
        $emailTypes = $emailTypeDAO->getAllRows();
        
        $emailService = new EmailService($db, $util, $validator, $emailDAO, $emailModel);
        
        $emailService->saveForm();
        
        
        ?>
        
        
         <h3>Add email</h3>
        <form action="#" method="post">
            <label>Email:</label>            
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            
            <br /><br />
            <label>Email Type:</label>
            <select name="emailtypeid">
            <?php 
                foreach ($emailTypes as $value) {
                    if ( $value->getEmailtypeid() == $emailTypeid ) {
                        echo '<option value="',$value->getEmailtypeid(),'" selected="selected">',$value->getEmailtype(),'</option>';  
                    } else {
                        echo '<option value="',$value->getEmailtypeid(),'">',$value->getEmailtype(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
            <input type="submit" value="Submit" />
        </form>

        <?php         
             if(isset($emailService))$emailService->displayEmailsActions();
         ?>
    </body>
</html>
