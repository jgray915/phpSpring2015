<?php
/**
 * CategoryDAO - Imports bank transaction JSON into database
 *
 * @author Jacob Gray
 */
class CategoryDAO {
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
     * Returns transactions without categories or false.
     *    
     * @return boolean
     */ 
    public function getTransactionsWithoutCategories(){
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT importId, transactionDate, generatedDescription, amount, class, category from CheckingAccountImport WHERE transactionType = 'WITHDRAWAL' and (category = '' or class = '')");

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
         return false;
    }
    
    /**
     * Returns spending totals by category per month
     *    
     * @param (int) $month - month int
     * 
     * @return (array)
     */ 
    public function getCategoryTotalsByMonth($month){
        $db = $this->getDB();
        $binds = array( ":month" => $month);
        $stmt = $db->prepare("SELECT amount, class, category from CheckingAccountImport WHERE transactionType = 'WITHDRAWAL' and MONTH(transactionDate) = :month AND YEAR(transactionDate) = YEAR(CURDATE())");
        
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            $trans = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $cats = $this->getCategories();
            $catTots = array();
            $totalSpent = 0;

            foreach($trans as $tran){
                $totalSpent += $tran["amount"];
            }

            foreach($cats as $cat){
                $catTot = 0;
                foreach($trans as $tran){
                    if($tran["category"] === $cat["category"]){
                        $catTot += $tran["amount"];
                    }
                }
                $catTots[$cat["category"]] = array("budget" => $cat["monthlyBudget"], "total" => $catTot);
            }
            return $catTots;
        }
        return false;
    }
    
    /**
     * Returns spending percentages by category per month
     *    
     * @param (int) $month - month int
     * 
     * @return json
     */ 
    public function getCategoryPctByMonth($month){
        $db = $this->getDB();
        $binds = array( ":month" => $month);
        $stmt = $db->prepare("SELECT amount, class, category from CheckingAccountImport WHERE transactionType = 'WITHDRAWAL' and MONTH(transactionDate) = :month AND YEAR(transactionDate) = YEAR(CURDATE())");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            $trans = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $cats = $this->getCategories();
        $expenses = 0;
        $invests = 0;
        $spends = 0;
        $totalSpent = 0;
        $catTots = array();
        
        foreach($trans as $tran){
            $totalSpent += $tran["amount"];
            switch($tran["class"]){
                case 'Expenses':
                    $expenses += $tran["amount"];
                    break;
                case 'Savings/Investments':
                    $invests += $tran["amount"];
                    break;
                case 'Spending':
                    $spends += $tran["amount"];
                    break;
            }
        }
        
        $returnArr = array( "Expenses" => round($expenses/$totalSpent*100, 2),
                            "Savings/Investments" => round($invests/$totalSpent*100, 2),
                            "Spending" => round($spends/$totalSpent*100, 2));
        
        foreach($cats as $cat){
            $catTot = 0;
            foreach($trans as $tran){
                if($tran["category"] === $cat["category"]){
                    $catTot += $tran["amount"];
                }
            }
            $catTots[$cat["category"]] = round($catTot/$totalSpent*100, 2);
        }
        
        $returnArr = array_merge($returnArr, $catTots);
        return json_encode($returnArr);
    }
    
    /**
     * Returns all categories
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
     * Updates transactions with new class and category by id.
     *    
     * @return boolean
     */ 
    public function updateTransactionCategories($id, $class, $category){
        $db = $this->getDB();
        $binds = array( ":id" => $id,
                        ":class" => $class,
                        ":category" => $category
                    );
        $stmt = $db->prepare("UPDATE CheckingAccountImport SET class = :class, category = :category WHERE importId = :id");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
         return false;
    }
    
    /**
     * Attempt to create new category
     *    
     * @param {String} [$class] - class
     * @param {String} [$category] - class
     * 
     * @return boolean
     */
    public function insert($class, $category) {
        $db = $this->getDB();
        $binds = array( ":class" => $class,
                        ":category" => $category
                    );
        $stmt = $db->prepare("INSERT INTO WithdrawalCategories SET category = :category, class = :class, createdDTS = now(), updatedDTS = now(), IsActive = true");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
        
         return false;
    }
    
    /**
     * Remove category from categories table and from transactions that are tagged with it
     *    
     * @param {String} [$category] - category name
     * 
     * @return boolean
     */
    public function removeCategory($category) {
        $db = $this->getDB();
        $binds = array( ":category" => $category);
        $stmt = $db->prepare("DELETE FROM `withdrawalcategories` WHERE category = :category");
        $stmt2 = $db->prepare("UPDATE `checkingaccountimport` SET `class`='',`category`='' WHERE category = :category");
        
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            if ( $stmt2->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
            }
        }
        
         return false;
    }
    
}