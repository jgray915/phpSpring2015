<h2>Import Transaction</h2>

<form action="#" method="post">
    <label>Paste in JSON:</label><br />
    <input type="text" id ="jsonInput" name="jsonString"/><br />
    <input type="submit" value="Submit">
</form>

<?php
    /*
     * Insert transactions from json into database
     */
    if ( $this->util->isPostRequest() ) {
        $importDAO = new ImportDAO($this->db->getDB());
        $input = json_decode($_POST["jsonString"], true);

        if($input != null){
            if($importDAO->insertTransactionJson($input)){
                $this->util->redirect('?view=categorize');
            }
            else{
                echo "<p>Import Failed, bad transaction formatting.</p>";
            }
        }
        else{
            echo "<p>Import Failed, bad JSON.</p>";
        }
    }

?>