<?php
# Comments behind a hashtag are not parsed by the server.
# They are handy for other people working with your code
# or later when when you forget what you intended.

# Here we are creating a variable to determine price of cookies.
$chocolatechipprice = 3;
$macadamianutprice = 4;

# Cookie wuantities are being determined by user input.
if (isset($_POST['chocolatechipqty'])) $chocolatechipqty = $_POST['chocolatechipqty'];
if (isset($_POST['macadamianutqty'])) $macadamianutqty = $_POST['macadamianutqty'];

# We are totaling the cookie's price by type.
$chocolatechiptotal = $chocolatechipprice * $chocolatechipqty;
$macadamianuttotal = $macadamianutprice * $macadamianutqty;

# The total price is the total of chocolate chip cookies
# plus the total price of macadamia nut cookies.
$total = $chocolatechiptotal + $macadamianuttotal;

# The name and value of the text boxes has been changed to
# coordinate with the above variables.
echo <<<_END
<form method='post' action='phpapp.php'>
<strong>Calculate Your Cookie Order</strong><br/><br/>
Chocolate Chip Cookies ($3 each):&nbsp;<input type='text' name='chocolatechipqty' value="$chocolatechipqty"/><br/>
Macadamia Nut Cookies ($4 each):&nbsp;<input type='text' name='macadamianutqty' value="$macadamianutqty"/><br/><br/>
<input type='submit' value='Calculate'/>
_END;
?>

<br/><br/>
Your total is:&nbsp;$<input type="text" value="<?php echo round($total)?>">
</form>
