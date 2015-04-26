<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class wraps stored procedures written for the checkingAccountTransactions 
 * table in the database.
 *
 * @author Jacob Gray
 */
class CheckingAccount {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=personalfinances;charset=utf8', 'root', '');
    }

    //returns the same fields as bank
    public function getCheckingTransactions() {
        $stmt = $this->db->query("CALL sp_GetCheckingTransactions()");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Returns all fields for the month specified by int for current year
     *
     * @param {int} [$month] - must be 1-12
     *
     * @return ??
     */
    public function getCheckingTransactionsByMonth($month) {
        $stmt = $this->db->prepare("CALL sp_GetCheckingTransactionsByMonth(:month)");
        $stmt->bindValue(":month", $month, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //returns same fields as bank by year provided by int
    public function getCheckingTransactionsByYear($year) {
        $stmt = $this->db->prepare("CALL sp_GetCheckingTransactionsByYear(:year)");
        $stmt->bindValue(":year", $year, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
}
?>