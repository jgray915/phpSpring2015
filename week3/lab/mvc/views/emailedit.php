<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
            
        
        if ( isset($scope->view['updated']) ) {
            if( $scope->view['updated'] ) {        
                 echo 'Email Updated';
            } else {
                 echo 'Email NOT Updated: "'.$scope->view['updated'].'"';
            }                 
        }
        
        $emailid = $scope->view['model']->getEmailid();
        $email = $scope->view['model']->getEmail();
        $active = $scope->view['model']->getActive();
        $emailTypeid = $scope->view['model']->getEmailtypeid();
        ?>
        
        
         <h3>Edit Email</h3>
        <form action="#" method="post">
            <label>Email:</label> 
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" /> <br />
            <label>Type:</label>
            <select name="emailtypeid">
            <?php 
                $emailTypes = $scope->view['emailTypes'];
                foreach ($emailTypes as $value) {
                    if ( $value->getEmailTypeId() == $EmailTypeid ) {
                        echo '<option value="',$value->getEmailTypeId(),'" selected="selected">',$value->getEmailType(),'</option>';  
                    } else {
                        echo '<option value="',$value->getEmailTypeId(),'">',$value->getEmailType(),'</option>';
                    }
                }
            ?>
            </select> <br />
            <label>Is Active:</label>
            <input type="number" max="1" min="0" name="Active" value="<?php echo $active; ?>" /> <br />
            <input type="hidden"  name="emailid" value="<?php echo $emailid; ?>" />
            <input type="hidden" name="action" value="update" />
            <input type="submit" value="Submit" />
        </form>
         
         <br />
         <br />
         
        <form action="#" method="post">
            <input type="hidden" name="action" value="add" />
            <input type="submit" value="Add Page" /> 
        </form>
         
         
         <?php
         
         if ( count($scope->view['Emails']) <= 0 ) {
            echo '<p>No Data</p>';
        } else {
            
            
             echo '<table border="1" cellpadding="5"><tr><th>Email</th><th>Type</th><th>Active</th><th>Edit</th><th>Delete</th></tr>';
             foreach ($scope->view['Emails'] as $value) {
                echo '<tr>';
                echo '<td>', $value->getEmail(),'</td>';
                echo '<td>', $value->getEmailType(),'</td>';
                echo '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="emailid" value="',$value->getEmailid(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="emailid" value="',$value->getEmailid(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
                echo '</tr>' ;
            }
            echo '</table>';
            
        }
         
         
         ?>
         
    </body>
</html>
