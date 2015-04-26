<form action="?view=Import" method="post">
    <label>Paste in JSON:</label>
    <textarea id ="jsonInput" name="foobar"/></textarea>
    <input type="submit" value="Submit">
</form>

<div id="tablediv"></div>
<script src="./script/jqplot/jquery.js"></script>
<script>
    
    function foo(){
        var input = JSON.parse($("#jsonInput").val());
        var html = "<table border='1'>";
        var transactions = input.transactionsresponse;
        for(var i = 0; i < transactions.length; i++)
        {
            html += "<tr>";
            transaction = transactions[i];
            for(var key in transaction)
            {
                html += "<td>"+key+" : "+transaction[key]+"</td>";
            }
            html += "</tr>";
        }
        html += "</table>";
        $("#tablediv").html(html);
    }

</script>

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
