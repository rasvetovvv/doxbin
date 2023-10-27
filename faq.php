<?php

// Counts the number of files in each dir and stores them in variables
$doxCount = count(glob("/var/www/dx/dox/*.*"));
$verCount = count(glob("/var/www/dx/img/verification/*.*"));
$ssnCount = count(glob("/var/www/dx/img/ssn/*.*"));
$ripCount = count(glob("/var/www/dx/img/rip/*.*"));
$mailCount = count(glob("/var/www/dx/img/mail/*.*"));
// Some math, to get percentages out of the above numbers
if ($doxCount == 0) {
 $doxCount = 1;
}
$verPercent = ($verCount / $doxCount) * 100;
$ssnPercent = ($ssnCount / $doxCount) * 100;
$ripPercent = ($ripCount / $doxCount) * 100;
$mailPercent = ($mailCount / $doxCount) * 100;

// Let's round it off, because there are about 10 more digits than we need

$verRound = round($verPercent, 2);
$ssnRound = round($ssnPercent, 2);
$ripRound = round($ripPercent, 2);
$mailRound = round($mailPercent, 2);

include ('inc/inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>DOXBIN - FAQ</title>
<!--<link href="style/blue.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<div class="container">
<h1>FAQ</h1><hr />
<p class="left">
    Мені короче похуй виставляйте кого хочете якщо мені щось не подобається я вдалєю))
</p>

<p class="contact">
KryvBin - Doxing<br />
Інста адміна (<a href="/inst.html">Інста</a>)<br />
E-mail: <a href="mailto:dozverkhovyna@gmail.com">dozverkhovyna@gmail.com</a> (Use it)<br />
Complaints: gg123<br />
</p>
 </div>
</body>
</html>
