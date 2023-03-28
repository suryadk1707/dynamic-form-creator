<?php
if($_SERVER){
	echo "<pre>";
	print_r($_SERVER);exit;
}
header('WWW-Authenticate: Basic realm="Restricted area"');
header('HTTP/1.0 401 Unauthorized');
echo "You Should login to access this page.";
exit;
?>