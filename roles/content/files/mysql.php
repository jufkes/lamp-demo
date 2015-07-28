<html>
 <head>
  <title>PHP Test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
    html, body {
        height: 100%;
    }
    #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        margin: 0 auto -60px;
    }
    #push, #footer {
        height: 60px;
    }
    #footer {
        background-color: #f5f5f5;
    }
    @media (max-width: 767px) {
        #footer {
            margin-left: -20px;
            margin-right: -20px;
            padding-left: 20px;
            padding-right: 20px;
        }
    }
    .container {
        width: auto;
        max-width: 680px;
    }
    .container .credit {
        margin: 20px 0;
    }
    .page-header i {
        float: left;
        margin-top: -5px;
        margin-right: 12px;
    }
    table td:first-child {
        width: 300px;
    }
    </style>
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

<p>
                <h3>Installed software</h3>
            <table class="table table-striped">
                <tr>
                    <td>PHP Version</td>
                    <td><?php echo phpversion(); ?></td>
                </tr>

                <tr>
                    <td>MySQL running</td>
                    <td><i class="icon-<?php echo ($mysql_running ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>MySQL version</td>
                    <td><?php echo ($mysql_running ? $mysql_version : 'N/A'); ?></td>
                </tr>

                <tr>
                    <td>Memcached running</td>
                    <td><i class="icon-<?php echo ($memcached_running ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>Memcached version</td>
                    <td><?php echo ($memcached_version ? $memcached_version : 'N/A'); ?></td>
                </tr>
            </table>
</p>

<p>
    <h3>PHP Modules</h3>
            <table class="table table-striped">
                <tr>
                    <td>MySQL</td>
                    <td><i class="icon-<?php echo (class_exists('mysqli') ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>CURL</td>
                    <td><i class="icon-<?php echo (function_exists('curl_init') ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>mcrypt</td>
                    <td><i class="icon-<?php echo (function_exists('mcrypt_encrypt') ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>memcached</td>
                    <td><i class="icon-<?php echo (class_exists('Memcached') ? 'ok' : 'remove'); ?>"></i></td>
                </tr>

                <tr>
                    <td>gd</td>
                    <td><i class="icon-<?php echo (function_exists('imagecreate') ? 'ok' : 'remove'); ?>"></i></td>
                </tr>
            </table>
</p>
 </body>
</html>
