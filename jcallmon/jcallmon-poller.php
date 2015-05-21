#####################################################
# jeff.powell@rakuten.com							#
#													#
# 28/11/2014										#
#													#
#													#
# 													#
#####################################################

<?php

$now = time();

$snmpreply=snmp2_walk("yyy", "xxx", "1.3.6.1.4.1.9.9.63.1.3.8.2");

$dataline=explode( ":", $snmpreply[0]);

$datavalue=$dataline[1];

$callstot=ceil($datavalue/2);

$ret = rrd_update("/opt/jcallmon/data/calldb.rrd", "$now:$callstot");

#echo "$now,$callstot,$ret";

?>

