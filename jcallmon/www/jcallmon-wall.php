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


create_graph("calls-halfday-wall.png",  "-12h",         "SIP CALLS last 12 hours",             "200", "1100");
create_graph("calls-month-wall.png",    "-1m",          "SIP CALLS last 1 month",              "150", "1100");
create_graph("calls-year-wall.png",     "-1y",          "SIP CALLS last 1 year",               "150", "1100");

echo "<html><head>";
echo "<meta http-equiv=\"refresh\" content=\"30\">";
echo "</head><body bgcolor='#080808'>";
echo "<font color='#808080' size ='9' face='verdana'>Cisco SIP calls</color>";
echo "<div align='center'>";
echo "<table>";
echo "<tr><td>";
echo "<img src='calls-halfday-wall.png' alt='Generated RRD image'>";
echo "</td></tr>";
echo "</table>";
echo "<table>";
echo "<tr><td>";
echo "<img src='calls-month-wall.png' alt='Generated RRD image'>";
echo "</td></tr>";
echo "</table>";
echo "<table>";
echo "<tr><td>";
echo "<img src='calls-year-wall.png' alt='Generated RRD image'>";
echo "</td></tr>";
echo "</table>";
echo "</div>";
echo "</body></html>";

exit;

function create_graph($output, $start, $title, $height, $width) {

  $options = array(
    "--slope-mode",
    "--start", $start,
    "--title=$title",
    "--vertical-label=Active Calls",
    "--lower=0",
    "--height=$height",
    "--width=$width",
    "-cBACK#161616",
    "-cCANVAS#1e1e1e",
    "-cSHADEA#000000",
    "-cSHADEB#000000",
    "-cFONT#c7c7c7",
    "-cGRID#888800",
    "-cMGRID#ffffff",
    "-nTITLE:10",
    "-nAXIS:12",
    "-nUNIT:10",
    "-y 1:5",
    "-cFRAME#ffffff",
    "-cARROW#000000",
    "DEF:callmax=/opt/jcallmon/data/calldb.rrd:callstot:MAX",
    "CDEF:transcalldatamax=callmax,1,*",
    "AREA:transcalldatamax#b6d14b40",
    "LINE4:transcalldatamax#a0b842:Active SIP Calls",
    "COMMENT:\\n",
    "GPRINT:transcalldatamax:MAX:Calls Max %6.2lf"
  );

 $ret = rrd_graph($output, $options, count($options));

  if (! $ret) {
    echo "<b>Graph error: </b>".rrd_error()."\n";
  }
}

?>
