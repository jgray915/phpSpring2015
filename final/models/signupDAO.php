<?php
class SignupDAO {
    
    private $DB = null;

    public function __construct( PDO $db ) {        
        $this->setDB($db);
    }
    
    private function setDB( PDO $DB) {        
        $this->DB = $DB;
    }
    
    private function getDB() {
        return $this->DB;
    }
    
    public function login($name, $password) {
        $db = $this->getDB();
        $binds = array( ":name" => $name,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        );
        $stmt = $db->prepare("SELECT username, userpassword FROM users WHERE username = :name AND userpassword = :password");
        var_dump($stmt);
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {            
            return true;            
        }
        return false;
    }
    
    
    public function create($name, $password) {
                 
        $db = $this->getDB();
        $binds = array( ":name" => $name,
                        ":password" => password_hash($password, PASSWORD_DEFAULT)
                    );
                     
        $stmt = $db->prepare("INSERT INTO users SET UserName = :name, UserPassword = :password, UserCreated = now(), UserUpdated = now(), UserType = 'user', UserIsActive = true");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
        var_dump($binds);
         return false;
    }
      
}