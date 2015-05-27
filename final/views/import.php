<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode($_POST["foobar"], true);
    foreach($input["transactionsresponse"] as $key=>$trans)
    {
        $storeId = $trans['storeId'];
        $transactionDate = $trans['transactionDate'];
        $amount = $trans['amount'];
        $fee = $trans['fee'];
        $amountToPrincipal = $trans['amountToPrincipal'];
        $amountToEscrow = $trans['amountToEscrow'];
        $amountToInterest = $trans['amountToInterest'];
        $ledgerBalance = $trans['ledgerBalance'];
        $checkNumber = $trans['checkNumber'];
        $transactionType = $trans['transactionType'];
        $pending = $trans['pending'];
        $generatedDescription = $trans['generatedDescription'];
        $transactionId = $trans['transactionId'];
        $intradayOrderId = $trans['intradayOrderId'];
        $exportTNUM = $trans['exportTNUM'];
        $depositSlipIdentifier = $trans['depositSlipIdentifier'];
        $checkImageIdentifier = $trans['checkImageIdentifier'];
        $creditTransaction = $trans['creditTransaction'];
    }
}

?>

<h2>Import Transaction</h2>

<form action="?view=Import" method="post">
    <label>Paste in JSON:</label><br />
    <input type="text" id ="jsonInput" name="foobar"/><br />
    <input type="submit" value="Submit">
</form>