#!/usr/bin/php

<?php

	error_reporting(0); // schakelt error reporting uit 
	set_time_limit(0); // zet een time % in dit geval 0, als dit bereikt word zal die normaal gesproken een syntax error pullen

	$host = $_SERVER['argv'][1];
	$sport = $_SERVER['argv'][2];
	$eport = $_SERVER['argv'][3];
	$delay = 1;

	function usage() {
		print "[PHP PORT SCANNER] " . "\n";
		print "Usage php {$_SERVER['argv'][0] } [hostname] [start] [end]" . "\n";
		print "\n" / "Example: php {$_SERVER['argv'][0]} google.com 80 443" . "\n";

		die();

	}

if($_SERVER['argc'] != 4) usage();

for($i = $sport; $i <= $eport; $i++) {

	$fp = fsockopen($host, $i, $errno, $errstr, $delay);

	if(getserverbyport($i, 'tcp') == '') $protocol = "unknown"; else $protocol = getservbyport($i, 'tcp');

	if($fp) {

		print "Port $i [$protocol] on $host is active" . "\n";
		fclose($fp);

	} else {

		print "Port $i [$protocol] on $host is inactive" . "\n";

	}

	flush();

}

?> 

