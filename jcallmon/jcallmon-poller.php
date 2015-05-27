<?php
###################################################################################
#                                                                                 #
# Author : jeff.powell@rakuten.com                                                #
#                                                                                 #
# Created : 28/11/2014                                                            #
# Updated : 27/05/2015                                                            #
#                                                                                 #
# Source : https://github.com/jeff-powell-rakuten                                 #
#                                                                                 #
# Install Instructions :                                                          #
# https://github.com/jeff-powell-rakuten/callmon/blob/master/jcallmon-install.txt #
#                                                                                 #
#                                                                                 #
###################################################################################


$now = time();

#$snmpreply=snmp2_walk("<<ENTER IP HERE>>", "<<ENTER SNMP COMMUNITY STRING HERE>>", "1.3.6.1.4.1.9.9.63.1.3.8.2");

#$dataline=explode( ":", $snmpreply[0]);

#$datavalue=$dataline[1];

#$callstot=ceil($datavalue/2);

$callstot=rand(0,10);

$ret = rrd_update("/opt/jcallmon/data/calldb.rrd", "$now:$callstot");

#echo "$now,$callstot,$ret";

?>

