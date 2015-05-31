<h2>Budgets</h2>

<table border="1">
    <tr>
        <th>Category</th>
        <th>Budget</th>
    </tr>

<?php
    $budgetDao = new BudgetDAO($this->db->getDB());
    $cats = $budgetDao->getCategories();
    
    if($cats){
        foreach($cats as $cat){
            echo "<tr><td>".$cat["category"]."</td><td><input type='text' id='".str_replace(" ","_",$cat["category"])."' value='".$cat["monthlyBudget"]."'></td></tr>\n";
        }
    }
?>
    
</table>

<button onclick="updateBudgets();">Update Budgets</button>

<?php
    if ( $this->util->isPostRequest() ) {
        foreach($_POST['updated'] as $budgets){
            foreach($budgets as $budget){
                $budgetDao->updateBudgets($budget["category"], $budget["value"]);
            }
        }
    }
?>

<script>
    <?php
        echo "var cats = ".json_encode($cats).";\n";
    ?>
 
     function updateBudgets(){
        var updated = {budgets: []};
        for(var i = 0; i < cats.length; i++){
            var budget = {};
            budget.category = cats[i].category, " = ";
            budget.value = $("#"+cats[i].category.replace(" ", "_")).val();
            updated.budgets.push(budget)
        }
        console.log(updated);
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
</script>