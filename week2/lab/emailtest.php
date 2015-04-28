<?php 
namespace week2\jgray;
include './bootstrap.php'; 
?>
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
        
        $emailId = filter_input(INPUT_POST, 'emailid');
        $email = filter_input(INPUT_POST, 'email');
        $emailTypeid = filter_input(INPUT_POST, 'emailtypeid');
        $active = filter_input(INPUT_POST, 'active');
        
        
         $emailTypeDAO = new EmailTypeDAO($db);
         $emailDAO = new EmailDAO($db);
         
         $emailTypes = $emailTypeDAO->getAllRows();

         $util = new Util();
         
          if ( $util->isPostRequest() && isset($_POST['submit']))
          {                
               $validator = new Validator(); 
                $errors = array();
                if( !$validator->emailIsValid($email) ) {
                    $errors[] = 'Email is invalid';
                } 
                
                if ( !$validator->activeIsValid($active) ) {
                     $errors[] = 'Active is invalid'.$active;
                }
                
                if ( empty($emailTypeid) ) {
                     $errors[] = 'Email type is invalid';
                }
                
                
                
                if ( count($errors) > 0 ) {
                    foreach ($errors as $value) {
                        echo '<p>',$value,'</p>';
                    }
                } else {
                    
                    $emailModel = new EmailModel();
                    
                    $emailModel->map(filter_input_array(INPUT_POST));
                    

                    if ( $emailDAO->save($emailModel) ) {
                        echo 'Email Added/Updated';
                    } else {
                        echo 'Email not added/updated';
                    }
                    
                }
          }
          else if ( $util->isPostRequest() && isset($_POST['delete']))
          {
              if($emailTypeDAO->delete($emailId)){
                  echo 'Email Deleted';
              } else {
                  echo 'Email not deleted';
              }
          }
        
        ?>
        
        
         <h3>Add Email</h3>
        <form action="#" method="post">
            <label>Email ID:</label>            
            <input type="text" name="emailid" value="" placeholder="" />
            <br /><br />
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
                    if ( $value->getEmailTypeId() == $EmailTypeid ) {
                        echo '<option value="',$value->getEmailTypeId(),'" selected="selected">',$value->getEmailType(),'</option>';  
                    } else {
                        echo '<option value="',$value->getEmailTypeId(),'">',$value->getEmailType(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
            <button type='submit' name='submit'>Submit</button>
            <button type='submit' name='delete'>Delete</button>
        </form>
         
            <table border="1" cellpadding="5">
                <tr>
                    <th>Email</th>
                    <th>Email Type ID</th>
                    <th>Last updated</th>
                    <th>Logged</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
         <?php 
            $emails = $emailDAO->getAllRows(); 
            foreach ($emails as $value) {
                echo '<tr><td>',$value->getEmail(),'</td><td>',$value->getEmailTypeId(),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLastupdated())),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLogged())),'</td>';
                echo  '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td> <td><button>Update</button></td> <td><button>Delete</button></td> </tr>' ;
            }

         ?>
            </table>
         <a href="emailtest.php">Email Test</a> - <a href="emailtypetest.php">Email Type Test</a>
    </body>
</html>