<?php
$chocolatechipprice = 3;
$macadamianutprice = 4;
if (isset($_POST['chocolatechipqty'])) $chocolatechipqty = $_POST['chocolatechipqty'];
if (isset($_POST['macadamianutqty'])) $macadamianutqty = $_POST['macadamianutqty'];
$chocolatechiptotal = $chocolatechipprice * $chocolatechipqty;
$macadamianuttotal = $macadamianutprice * $macadamianutqty;
$total = $chocolatechiptotal + $macadamianuttotal;
echo <<<_END
<form method='post' action='phpapp.php'>
<strong>Calculate Your Cookie Order</strong><br/>
Chocolate Chip Cookies ($3 each):&nbsp;<input type='text' name='chocolatechipqty' value="$chocolatechipqty"/><br/>
Macadamia Nut Cookies ($4 each):&nbsp;<input type='text' name='macadamianutqty' value="$macadamianutqty"/><br/>
<input type='submit' value='Calculate'/>
_END;
?>

<br/>
Your total is:&nbsp;$<input type="text" value="<?php echo round($total)?>">
</form>
