<?php
$chocolatechipprice = 3;
$macadamianutprice = 4;
if (isset($_POST['qtychocolatechip'])) $qtychocolatechip = $_POST['qtychocolatechip'];
if (isset($_POST['qtymacadamianut'])) $qtymacadamianut = $_POST['qtymacadamianut'];
$chocolatechiptotal = $qtychocolatechip * $qtychocolatechip;
$macadamianuttotal = $macadamianutprice * $qtychocolatechip;
$total = $chocolatechiptotal + $macadamianuttotal;
echo <<<_END
<form method='post' action='phpapp.php'>
<strong>Calculate Your Cookie Order</strong><br/>
Chocolate Chip Cookies:&nbsp;<input type='text' name='qtychocolatechip' value="$qtychocolatechip"/><br/>
Macadamia Nut Cookies:&nbsp;<input type='text' name='qtymacadamianut' value="$qtymacadamianut"/><br/>
<input type='submit' value='Calculate'/>
_END;
?>

<br/>
Your total is:&nbsp;$<input type="text" value="<?php echo round($total)?>">
</form>
