<?php
/**
 * EmailTypeDB Class
 * 
 * Save and display email types.
 *
 * @author Jacob Gray
 */
class EmailTypeDB {
    
    private $dbConfig;
    private $pdo;
    private $db;
    
    /**
     * A constructor to init class variables.
     */
    public function __construct() {
        $this->dbConfig = [
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
            ];
        $this->pdo = new DB($this->dbConfig); 
        $this->db = $this->pdo->getDB();
    }
    
    /**
     * A method to save an email to the database.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function saveEmailType($emailType) {
        $stmt = $this->db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");             
        $values = array(":emailtype"=>$emailType);
        
        if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
            return 0;
        }
        
        return 1; 
    }
    
    /**
     * A method to echo email types.
     */
    public function displayEmailTypes() {
        $stmt = $this->db->prepare("SELECT * FROM emailtype where active = 1");
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<strong><p>Current Email Types:</p>";
            
            foreach ($results as $value) {
                echo '<p>', $value['emailtype'], '</p>';
            }
            echo "</strong>"; 
        }
    }
    
    
}
