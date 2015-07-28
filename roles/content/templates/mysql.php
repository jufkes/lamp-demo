<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<p><b><font size="14">PHP STATUS PAGE!</font></b></p>
<p><font size="6">The Virtual Machine is up and running! Here's some other useful stuff"</font></p>
<p><b><font size="6">System Information</font></b></p>
 <?php echo
$link   = mysql_connect('localhost', 'lamp', 'lamp') or
  die('Could not connect: ' . mysql_error());
ob_start();
phpinfo(INFO_MODULES);
$info = ob_get_contents();
ob_end_clean();
$info = stristr($info, 'Client API version');
preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match);
$gd = $match[0];
echo 'MySQL Version:  '.$gd.' <br />';
echo 'OTHER: '.$info.' <br />';

?>

<p><b><font size="6">Installed Software</font></b></p>

<p><b><font size="6">PHP Modules</font></b></p>
 </body>
</html>
