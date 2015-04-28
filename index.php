<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My page</title>
        <style>

        </style>
    </head>
    <body>
        <div id="wrapper">
        <?php
        $files = scandir(".");
        $i = 0;
        foreach($files as $file)
        {
            echo "<ul>";
            if($i > 1)
            {
                echo "<li><a href='./".$file."'>".$file."</a></li>\n";
            }
            echo "</ul>";
            $i++;
        }
        
        ?>
        </div><!--wrapper-->
    </body>
</html>
