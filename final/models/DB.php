<?php
/**
 * DB - Connects to the database.
 *
 * @author Jacob Gray
 */
class DB {   
    protected $db = null;
    private $dbConfig = array();

    /**
     * Set intitial database configuration
     *    
     * @param {Array} [$dbConfig] - Database config
     */    
    public function __construct($dbConfig) {
        $this->setDbConfig($dbConfig);      
    }
    
    /**
     * Get database configuration
     *    
     * @return {Array} - Database config
     */   
    private function getDbConfig() {
        return $this->dbConfig;
    }
    
    /**
     * Set database configuration
     *    
     * @param {Array} [$dbConfig] - Database config
     */   
    private function setDbConfig($dbConfig) {
        $this->dbConfig = $dbConfig;
    }
    
    /**
     * Get database connection.
     *    
     * @return PDO
     */           
    public function getDB() { 
        if ( null != $this->db ) {
            return $this->db;
        }
        
        try {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } 
        catch (Exception $ex) {
           $this->closeDB();
        }
        
        return $this->db;        
    }
    
    /**
     * Close database connection.
     *    
     */  
     public function closeDB() {        
        $this->db = null;        
    }
    
}