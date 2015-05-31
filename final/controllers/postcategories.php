<?php

    foreach($_POST['updated'] as $trans){
        foreach($trans as $tran){
            var_dump($tran["id"]);
        }
    }
   
?>