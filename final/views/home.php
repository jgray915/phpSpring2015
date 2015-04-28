<h2>Home</h2
<link rel="stylesheet" type="text/css" href="jquery.jqplot.css" />
<div id="Macro" style="width:49%;float:left"></div>
<div id="Expenses" style="width:49%;float:right"></div>
<div id="Purchases" style="width:49%;float:left"></div>
<div id="Savings" style="width:49%;float:right"></div>
<div style="clear:both"></div>
<script src="./script/jqplot/jquery.js"></script>
<script src="./script/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="./script/jqplot/plugins/jqplot.pieRenderer.min.js"></script>

<script>
$(document).ready(function(){
  var data = [
    ['Expenses', 33],['Purchases', 33], ['Savings/Investments', 33] 
  ];
  var plot1 = jQuery.jqplot ('Macro', [data], 
    { 
        title:"Macro",
        seriesDefaults: {
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
              showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});

$(document).ready(function(){
  var data = [
    ['Rent', 1400],['Electric', 300], ['Verizon', 120], ['Credit Card', 20] 
  ];
  var plot1 = jQuery.jqplot ('Expenses', [data], 
    {
		title:"Expenses",
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});

$(document).ready(function(){
  var data = [
    ['Restaurant', 50],['Entertainment', 5], ['Liquor', 40],['Amazon',30] 
  ];
  var plot1 = jQuery.jqplot ('Purchases', [data], 
    { 
		title:"Purchases",
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});

$(document).ready(function(){
  var data = [
    ['Savings', 90],['Investments', 10]
  ];
  var plot1 = jQuery.jqplot ('Savings', [data], 
    {
		title:"Savings/Investments",
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});
</script>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>