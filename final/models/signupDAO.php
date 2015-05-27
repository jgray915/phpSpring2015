<?php
class SignupDAO {
    
    private $DB = null;
    private $model = null;
    public function __construct( PDO $db ) {        
        $this->setDB($db);
    }
    
    private function setDB( PDO $DB) {        
        $this->DB = $DB;
    }
    
    private function getDB() {
        return $this->DB;
    }
    
    private function getModel() {
        return $this->model;
    }
    private function setModel($model) {
        $this->model = $model;
    }
    
    public function login($model) {
         
        $email = $model->getEmail();
        $password = $model->getPassword();
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM signup WHERE email = :email");
        if ( $stmt->execute(array(':email' => $email)) && $stmt->rowCount() > 0 ) {            
            $results = $stmt->fetch(PDO::FETCH_ASSOC);            
            return password_verify($password, $results['password']);            
        }
         
        return false;
    }
    
    
    public function create($name, $password) {
                 
        $db = $this->getDB();
        $binds = array( ":name" => $name,
                        ":password" => password_hash($password, PASSWORD_DEFAULT)
                    );
                     
        $stmt = $db->prepare("INSERT INTO users SET UserName = :email, UserPassword = :password, UserCreated = now(), UserUpdated = now(), UserType = 'user', UserIsActive = true");
         
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
         
         return false;
    }
    
    
    public function update($model) {
          
        $db = $this->getDB();
        $binds = array( ":id" => $model->getId(),
                        ":email" => $model->getEmail(),
                        ":password" => password_hash($model->getPassword(), PASSWORD_DEFAULT),
                        ":active" => $model->getActive()
                    );
        $stmt = $db->prepare("UPDATE signup SET email = :email, password = :password, active = :active WHERE id = :id");
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
          
}