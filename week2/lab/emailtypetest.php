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
        
        $emailType = filter_input(INPUT_POST, 'emailtype');
        $emailTypeId = filter_input(INPUT_POST, 'emailtypeid');
        $active = filter_input(INPUT_POST, 'active');
        
        
         $emailTypeDAO = new EmailTypeDAO($db);
         $emailDAO = new EmailDAO($db);
         
         $emailTypes = $emailTypeDAO->getAllRows();

         $util = new Util();
         
          if ( $util->isPostRequest() && isset($_POST['submit'])) {
                            
               $validator = new Validator(); 
                $errors = array();
                if ( empty($emailType) ) {
                     $errors[] = 'Email type is invalid';
                }
                
                if ( !$validator->activeIsValid($active) ) {
                     $errors[] = 'Active is invalid'.$active;
                }
    
                if ( count($errors) > 0 ) {
                    foreach ($errors as $value) {
                        echo '<p>',$value,'</p>';
                    }
                } else {
                    
                    
                    $emailTypeModel = new EmailTypeModel();
                    
                    $emailTypeModel->map(filter_input_array(INPUT_POST));
                    
                   // var_dump($phonetypeModel);
                    if ( $emailTypeDAO->save($emailTypeModel) ) {
                        echo 'Email Type Added/Updated';
                    } else {
                        echo 'Email type not added/updated';
                    }
                    
                }
          }
          else if ( $util->isPostRequest() && isset($_POST['delete']))
          {
              if($emailTypeDAO->delete($emailTypeId)){
                  echo 'Email Type Deleted';
              } else {
                  echo 'Email type not deleted';
              }
          }
        
        ?>
        
        
         <h3>Add Email Type</h3>
        <form action="#" method="post">
            <label>Email Type ID:</label>            
            <input type="text" name="emailtypeid" value="<?php echo $emailTypeId; ?>" placeholder="" />
            <br /><br />
            <label>Email Type:</label>            
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            
            <br /><br />

            <button type='submit' name='submit'>Submit</button>
            <button type='submit' name='delete'>Delete</button>
        </form>
         
            <table border="1" cellpadding="5">
                <tr>
                    <th>Email Type</th>
                    <th>Email Type ID</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
         <?php 
            $emailTypes = $emailTypeDAO->getAllRows(); 
            foreach ($emailTypes as $value) {
                echo '<tr><td>',$value->getEmailType(),'</td><td>',$value->getEmailTypeId(),'</td>';
                echo  '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td> <td><button>Update</button></td> <td><button>Delete</button></td> </tr>' ;
            }

         ?>
            </table>
         <a href="emailtest.php">Email Test</a> - <a href="emailtypetest.php">Email Type Test</a>
    </body>
</html>