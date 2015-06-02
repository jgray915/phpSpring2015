<h2>Monthly Report</h2>

<div id="container" style=" margin:0 auto"></div>
<div id="container2" style=" margin:0 auto"></div>

<h3>Budgets</h3>

<table border="1">
    <tr>
        <th>Category</th>
        <th>Total Spent</th>
        <th>Over/Under</th>
    </tr>
    
    <?php
        /*
        * Create budget display table
        */
        $categoryDao = new CategoryDAO($this->db->getDB());
        $catTots = $categoryDao->getCategoryTotalsByMonth(date('m'));
        
        if($catTots){
            foreach($catTots as $key => $value){
                if($value["total"] != 0){
                    echo "<tr><td>".$key."</td><td>".$value["total"]."</td>\n\t";
                    if($value["budget"] == 0){
                        echo "<td>-";
                    }
                    else if($value["budget"]-$value["total"] >= 0){
                        echo "<td class='successText'>".($value["budget"]-$value["total"]);
                    }
                    else if($value["budget"]-$value["total"] < 0){
                        echo "<td class='errorText'>".($value["budget"]-$value["total"]);
                    }
                    echo "</td></tr>\n";
                }
            }
        }
        
    ?>
    
</table>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>

$(function () {
    <?php 
        /*
        * Pass category percentages to script
        */
        echo "var catPct = ".$categoryDao->getCategoryPctByMonth(date('m')).";\n\n";
    ?>
    
    /*
    * Create lists for the two charts
    */
    var classList = [];
    var catList = [];
    for (var key in catPct) {
        if (catPct.hasOwnProperty(key)) {
            if((key === "Expenses" || key === "Savings/Investments" || key === "Spending") && catPct[key] != 0){
                classList.push([key, catPct[key]]);
                
            }
            else if(catPct[key] != 0){
                catList.push([key, catPct[key]]);
            }
        }
    }
    
    /*
    * Create the two charts
    */
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Spending By Class'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: classList
        }]
    });
    
    
    
    
    $('#container2').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Spending By Category'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: catList
        }]
    });
    
});

</script>