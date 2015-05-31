<?php
/**
 * ImportDAO - Imports bank transaction JSON into database
 *
 * @author Jacob Gray
 */
class ImportDAO {
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
     * Attempts to insert transactions from bank json into database.
     *    
     * @return boolean
     */ 
    public function insertTransactionJson($input){
        try{
            foreach($input["transactionsresponse"] as $key=>$trans){
                $storeId = (string)$trans['storeId'];
                $transactionDate = (string)$trans['transactionDate'];
                $amount = (string)$trans['amount'];
                $fee = (string)$trans['fee'];
                $amountToPrincipal = (string)$trans['amountToPrincipal'];
                $amountToEscrow = (string)$trans['amountToEscrow'];
                $amountToInterest = (string)$trans['amountToInterest'];
                $ledgerBalance = (string)$trans['ledgerBalance'];
                $checkNumber = (string)$trans['checkNumber'];
                $transactionType = (string)$trans['transactionType'];
                $pending = (string)$trans['pending'];
                $generatedDescription = (string)$trans['generatedDescription'];
                $transactionId = (string)$trans['transactionId'];
                $intradayOrderId = (string)$trans['intradayOrderId'];
                $exportTNUM = (string)$trans['exportTNUM'];
                $depositSlipIdentifier = (string)$trans['depositSlipIdentifier'];
                $checkImageIdentifier = (string)$trans['checkImageIdentifier'];
                $creditTransaction = (string)$trans['creditTransaction'];
                
                //convert date format from mm/dd/yyyy to yyyy-mm-dd
                $transactionDate = explode('/', $transactionDate);
                $transactionDate = [$transactionDate[2], $transactionDate[0], $transactionDate[1]];
                $transactionDate = join( '-', $transactionDate);

                if(!$this->insertTransaction(  
                        $storeId, 
                        $transactionDate, 
                        $amount, 
                        $fee, 
                        $amountToPrincipal, 
                        $amountToEscrow, 
                        $amountToInterest, 
                        $ledgerBalance, 
                        $checkNumber, 
                        $transactionType, 
                        $pending, 
                        $generatedDescription, 
                        $transactionId, 
                        $intradayOrderId, 
                        $exportTNUM, 
                        $depositSlipIdentifier, 
                        $checkImageIdentifier, 
                        $creditTransaction )){
                    throw new Exception();
                }
            }
        }
        catch(Exception $ex) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Attempts to insert transaction into database.
     *    
     * @return boolean
     */ 
    public function insertTransaction($storeId, 
                            $transactionDate, 
                            $amount, 
                            $fee, 
                            $amountToPrincipal, 
                            $amountToEscrow, 
                            $amountToInterest, 
                            $ledgerBalance, 
                            $checkNumber, 
                            $transactionType, 
                            $pending, 
                            $generatedDescription, 
                            $transactionId, 
                            $intradayOrderId, 
                            $exportTNUM, 
                            $depositSlipIdentifier, 
                            $checkImageIdentifier, 
                            $creditTransaction ) {
        $db = $this->getDB();
        $binds = array( ":storeId" => $storeId, 
                        ":transactionDate" => $transactionDate, 
                        ":amount" => $amount, 
                        ":fee" => $fee, 
                        ":amountToPrincipal" => $amountToPrincipal, 
                        ":amountToEscrow" => $amountToEscrow, 
                        ":amountToInterest" => $amountToInterest, 
                        ":ledgerBalance" => $ledgerBalance, 
                        ":checkNumber" => $checkNumber, 
                        ":transactionType" => $transactionType, 
                        ":pending" => $pending, 
                        ":generatedDescription" => $generatedDescription, 
                        ":transactionId" => $transactionId, 
                        ":intradayOrderId" => $intradayOrderId, 
                        ":exportTNUM" => $exportTNUM, 
                        ":depositSlipIdentifier" => $depositSlipIdentifier, 
                        ":checkImageIdentifier" => $checkImageIdentifier, 
                        ":creditTransaction" => $creditTransaction);
        $stmt = $db->prepare("INSERT INTO checkingAccountImport SET storeId = :storeId,
                                transactionDate = :transactionDate,
                                amount = :amount,
                                fee = :fee,
                                amountToPrincipal = :amountToPrincipal,
                                amountToEscrow = :amountToEscrow,
                                amountToInterest = :amountToInterest,
                                ledgerBalance = :ledgerBalance,
                                checkNumber = :checkNumber,
                                transactionType = :transactionType,
                                pending = :pending,
                                generatedDescription = :generatedDescription,
                                transactionId = :transactionId,
                                intradayOrderId = :intradayOrderId,
                                exportTNUM = :exportTNUM,
                                depositSlipIdentifier = :depositSlipIdentifier,
                                checkImageIdentifier = :checkImageIdentifier,
                                creditTransaction = :creditTransaction,
                                importDate = now()");

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
        
         return false;
    }
      
}