<?php
/**
 * BudgetDAO - Tools to set and update budgets
 *
 * @author Jacob Gray
 */
class BudgetDAO {
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
     * Get database.
     *    
     * @return PDO
     */
    private function getDB() {
        return $this->DB;
    }
    
    /**
     * Returns all categories or false
     *    
     * @return boolean
     */ 
    public function getCategories(){
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * from WithdrawalCategories");

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
         return false;
    }
      
    /**
     * Updates category with new budget.
     *    
     * @return boolean
     */ 
    public function updateBudgets($category, $budget){
        $db = $this->getDB();
        $binds = array( ":category" => $category,
                        ":budget" => $budget
                    );
        $stmt = $db->prepare("UPDATE WithdrawalCategories SET monthlyBudget = :budget WHERE category = :category");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
         return false;
    }
}