<?php

/**
 * This class wraps stored procedures written for the checkingAccountTransactions 
 * table in the database.
 *
 * @author Jacob Gray
 */
class CheckingAccount {
    
    private $db;

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=personalfinances;charset=utf8', 'root', '');
    }

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    public function getCheckingTransactions() {
        $stmt = $this->db->query("CALL sp_GetCheckingTransactions()");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    public function getCheckingTransactionsByMonth($month) {
        $stmt = $this->db->prepare("CALL sp_GetCheckingTransactionsByMonth(:month)");
        $stmt->bindValue(":month", $month, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    public function getCheckingTransactionsByYear($year) {
        $stmt = $this->db->prepare("CALL sp_GetCheckingTransactionsByYear(:year)");
        $stmt->bindValue(":year", $year, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
}
?>