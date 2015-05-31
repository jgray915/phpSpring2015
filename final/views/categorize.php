<h2>Categorize Transactions</h2>

<table border='1'>
    <tr>
        <th>Date</th>
        <th>Desc</th>
        <th>Amount</th>
        <th>Class</th>
        <th>Category</th>
    </tr>
    <?php   
        $categoryDao = new CategoryDAO($this->db->getDB());
        $trans = $categoryDao->getTransactionsWithoutCategories();
        $transIds = array();
        $cats = $categoryDao->getCategories();
        $expenseCats = array();
        $investCats = array();
        $spendCats = array();
        
        if($cats){
            foreach($cats as $cat){
                if($cat["class"] === "Expenses"){
                    array_push($expenseCats, $cat["category"]);
                }
                else if($cat["class"] === "Savings/Investments"){
                    array_push($investCats, $cat["category"]);
                }
                else if($cat["class"] === "Spending"){
                    array_push($spendCats, $cat["category"]);
                }
            }
        }
        
        if($trans){
            foreach($trans as $tran){
                array_push($transIds, $tran["importId"]);
                echo "<tr id=".$tran["importId"]."><td>".$tran["transactionDate"]."</td>";
                echo "<td>".$tran["generatedDescription"]."</td>";
                echo "<td>".$tran["amount"]."</td><td>";
                
                switch($tran["class"]){
                    case '':
                        echo '  <select class="class" onchange="updateOptions('.$tran["importId"].');">
                                    <option value="" selected>-</option>
                                    <option value="Expenses">Expenses</option>
                                    <option value="Savings/Investments">Savings/Investments</option>
                                    <option value="Spending">Spending</option>
                                </select>';
                        break;
                    case 'Expenses':
                        echo '  <select class="class" onchange="updateOptions('.$tran["importId"].');">
                                    <option value="">-</option>
                                    <option value="Expenses" selected>Expenses</option>
                                    <option value="Savings/Investments">Savings/Investments</option>
                                    <option value="Spending">Spending</option>
                                </select>';
                        break;
                    case 'Savings/Investments':
                        echo '  <select class="class" onchange="updateOptions('.$tran["importId"].');">
                                    <option value="">-</option>
                                    <option value="Expenses">Expenses</option>
                                    <option value="Savings/Investments" selected>Savings/Investments</option>
                                    <option value="Spending">Spending</option>
                                </select>';
                        break;
                    case 'Spending':
                        echo '  <select class="class" onchange="updateOptions('.$tran["importId"].');">
                                    <option value="">-</option>
                                    <option value="Expenses">Expenses</option>
                                    <option value="Savings/Investments">Savings/Investments</option>
                                    <option value="Spending" selected>Spending</option>
                                </select>';
                        break;
                    default:
                        echo '  <select class="class" onchange="updateOptions('.$tran["importId"].');">
                                    <option value="" selected>-</option>
                                    <option value="Expenses">Expenses</option>
                                    <option value="Savings/Investments">Savings/Investments</option>
                                    <option value="Spending">Spending</option>
                                </select>';
                        break;
                }
                
                switch($tran["category"]){
                    case '':
                        break;
                    default:
                        break;
                    
                }
                
                echo "</td><td><select class='category'><option value='' selected>-</option></select></td></tr>";
            }
        }
    
    ?>
</table>
<br />
<button onclick="updateTrans();">Update Transactions</button>

<?php
    if ( $this->util->isPostRequest() ) {
        foreach($_POST['updated'] as $trans){
            foreach($trans as $tran){
                $categoryDao->updateTransactionCategories($tran["id"],$tran["class"],$tran["cat"]);
            }
        }
    }
?>

<script>
    <?php
        $js_ids = json_encode($transIds);
        $js_expense = json_encode($expenseCats);
        $js_invest = json_encode($investCats);
        $js_spend = json_encode($spendCats);
        echo "var transIds = ".$js_ids.";";
        echo "var expenseCats = ".$js_expense.";";
        echo "var investCats = ".$js_invest.";";
        echo "var spendCats = ".$js_spend.";";
    ?>
    var rows = $(".category");
    
    function updateOptions(inputId){
        switch($("#"+inputId+" .class").val()){
            case '-':
                $("#"+inputId+" .category").empty();
                $("#"+inputId+" .category").append("<option value=''>-</option");
                break;
            case 'Expenses':
                $("#"+inputId+" .category").empty();
                $("#"+inputId+" .category").append("<option value=''>-</option");
                for(var j = 0; j < expenseCats.length; j++){
                    $("#"+inputId+" .category").append("<option value='"+expenseCats[j]+"'>"+expenseCats[j]+"</option");
                }
                break;
            case 'Savings/Investments':
                $("#"+inputId+" .category").empty();
                $("#"+inputId+" .category").append("<option value=''>-</option");
                for(var j = 0; j < investCats.length; j++){
                    $("#"+inputId+" .category").append("<option value='"+investCats[j]+"'>"+investCats[j]+"</option");
                }
                break;
            case 'Spending':
                $("#"+inputId+" .category").empty();
                $("#"+inputId+" .category").append("<option value=''>-</option");
                for(var j = 0; j < spendCats.length; j++){
                    $("#"+inputId+" .category").append("<option value='"+spendCats[j]+"'>"+spendCats[j]+"</option");
                }
                break;
            default:
                $("#"+inputId+" .category").empty();
                $("#"+inputId+" .category").append("<option value=''>-</option");
                break;
        }
    }
    
    function updateTrans(){
        var updated = {trans: []};
        for(var i = 0; i < transIds.length; i++){
            var tran = {};
            tran.id = (transIds[i]);
            tran.class = ($("#"+transIds[i]+" .class").val());
            tran.cat = ($("#"+transIds[i]+" .category").val());
            updated.trans.push(tran);
        }
        
        $.ajax({
            type: "POST",
            url: "#",
            data: {"updated": updated},
            success: function(response){
                console.log(response);
                location.reload(true);
            },
            fail: function(){
                console.log("fail");
            }
          });
    }
    
    updateOptions();
</script>