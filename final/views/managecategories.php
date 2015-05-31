<h2>Categories</h2>

<h3>Add New Category</h3>

<form action="#" method="post">
    <label>Class:</label>
    <select name='class'>
        <option value="Expenses">Expenses</option>
        <option value="Savings/Investments">Savings/Investments</option>
        <option value="Spending">Spending</option>
    </select>
    <label>Category:</label>
    <input type="text" name="category"/>
    <input type="submit" value="Add Category" />
</form>

<hr>

<h3>Remove Categories</h3>

<table border="1">
    <tr>
        <th>Category</th>
        <th>Delete</th>
    </tr>

<?php
    /*
    * Create category table
    */
    $categoryDao = new CategoryDAO($this->db->getDB());
    $cats = $categoryDao->getCategories();
    if($cats){
        foreach($cats as $cat){
            echo "<tr><td>".$cat["category"]."</td><td><input type='checkbox' id='".str_replace(" ","_",$cat["category"])."'></td></tr>\n";
        }
    }
?>
    
</table>

<button onclick="deleteCategory();">Delete Category</button>

<?php
    /*
    * On post, either add or remove category
    */
   if ( $this->util->isPostRequest() ){
        $info = filter_input_array(INPUT_POST);
       
        if(is_string($info["category"]) && !empty($info["category"])){
            if ( $categoryDao->insert($info["class"], $info["category"]) ) {
                $this->util->redirect("#");
            }
        }
        
        if(isset($_POST['updated'])){
            foreach($_POST['updated'] as $cats){
                foreach($cats as $cat){
                    $categoryDao->removeCategory($cat);
                }
            }
        }
   }
   
?>

<script>
    <?php
        /*
        * Pass categories to script
        */
        echo "var cats = ".json_encode($cats).";\n";
    ?>
 
    /*
    * Post back categories to delete
    */
     function deleteCategory(){
        var updated = {categories: []};
        for(var i = 0; i < cats.length; i++){
            if($("#"+cats[i].category.replace(" ", "_")).is(":checked")){
                var category = cats[i].category;
                updated.categories.push(category);
            }
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