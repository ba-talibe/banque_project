
<script>
    function sendHidenData(){
        hiddenData = document.forms["form"]["data"].value;
        return hiddenData;
    }
</script>
<form name="form" onsubmit="return sendHidenData()">
    <input name="date" type="hidden" value="donnes cacher">
    <input type="text" class="champ">
    <input type="submit" >
<form>
<?php
    /*
    require "core.php";
    $str = "dd745";
    $str = getEnumFormat("retrait");
    if (!(validateAmount(50000, 60000, $str))){
        echo "<script> alert ('Transaction Impossible');</script>";
    }else{
        echo "<script> alert ('Transaction possible');</script>";
    }
    */
    $data = "<script>sendHidenData();</script>";
    echo "<h1>" . $data . "</h1>";
?>