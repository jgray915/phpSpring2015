<?php
/**
 * UserDAO - Handles user signup/logins
 *
 * @author Jacob Gray
 */
class UserDAO {
    private $DB = null;

    /**
     * Set initial database.
     *    
     * @param PDO
     */
    public function __construct( PDO $db ) {        
        $this->setDB($db);
    }
    
    /**
     * Set database.
     *    
     * @param PDO
     */
    private function setDB( PDO $DB) {        
        $this->DB = $DB;
    }
    
    /**
     * Get initial database.
     *    
     * @return PDO
     */
    private function getDB() {
        return $this->DB;
    }
    
    /**
     * Check login credentials
     *    
     * @param {String} [$name] - username
     * @param {String} [$name] - password
     * 
     * @return boolean
     */
    public function login($name, $password) {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT userid, username, userpassword, usertype, userisactive, usercreated, userupdated FROM users WHERE username = :name");

        if ( $stmt->execute(array(':name' => $name)) && $stmt->rowCount() > 0 ) {            
            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($password, $results['userpassword']))
            {
                $_SESSION['loggedin'] = true;
                $_SESSION["username"] = $results["username"];
                return true;    
            }
        }
         
        return false;
    }
    
    /**
     * Attempt to create user with credentials
     *    
     * @param {String} [$name] - username
     * @param {String} [$name] - password
     * 
     * @return boolean
     */
    public function create($name, $password) {
        $db = $this->getDB();
        $binds = array( ":name" => $name,
                        ":password" => password_hash($password, PASSWORD_DEFAULT)
                    );
        $stmt = $db->prepare("INSERT INTO users SET UserName = :name, UserPassword = :password, UserCreated = now(), UserUpdated = now(), UserType = 'user', UserIsActive = true");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
        
         return false;
    }
      
}