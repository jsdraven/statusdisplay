<?php
$body .=<<<HTML
<form action='' method='POST'>
<input type="hidden" name="set" value="testFeed" />
<lable for='name'>Name:</lable>
$name
<br />
<lable for="jobtitle">Job Title:</lable>
<input type="text" name="jobtitle" id="jobtitle" />
<input type="submit" id="submit" name="submit" value="Submit" />
</form>
HTML;
