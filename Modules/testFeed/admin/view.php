<?php
$body .=<<<HTML
<form action='' method='POST'>
<input type="hidden" name="set" value="testFeed" />
<table border="0">
<tr>
<td>
<lable for='name'>Name:</lable>
$name
</td>
</tr>
<tr>
<td>
<lable for="jobtitle">Job Title:</lable>
<input type="text" name="jobtitle" id="jobtitle" />
</td>
</tr>
<tr>
<td>
<lable for="startdate">Start Date</lable>  
<input type="text" name="startDate" id="startDate" />
</td>
</tr>
<tr>
<td>
<lable for="endDate">End Date</lable>
<input type="text" name="endDate" id="endDate" />
</td>
</tr>
<tr>
<td>
<input type="submit" id="submit" name="submit" value="Submit" />
</td>
</tr>
</table>
</form>
HTML;
