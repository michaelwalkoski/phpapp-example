<?php
if (isset($_POST['value1'])) $value1 = $_POST['value1'];
if (isset($_POST['value2'])) $value2 = $_POST['value2'];
$answer = $value1 * $value2;

echo <<<_END
<form method='post' action='phpapp.php'>
<strong>Calculate</strong><br/><input type='text' name='value1' value="$value1"/>&nbsp;*&nbsp;<input type='text' name='value2' value="$value2"/><br/>
<input type='submit' value='Calculate'/>
_END;
?>

<br/>
The answer is:<input type="text" value="<?php echo round($answer)?>">
</form>
