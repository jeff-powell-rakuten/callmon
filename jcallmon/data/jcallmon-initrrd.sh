#!/bin/bash

#####################################################
# jeff.powell@rakuten.com							#
#													#
# 28/11/2014										#
#													#
# move this file to /etc/cron.day					#
# 													#
#####################################################

# sample every 1 min
# keep  1 min  samples for    7 days = (60/ 1) * 24 *    7 = 10080
# keep 10 min  samples for  100 days = (60/10) * 24 *  100 = 14400
# keep  1 hour samples for 1000 days = (60/60) * 24 * 1000 = 24000

/usr/bin/rrdtool create /opt/jcallmon/data/calldb.rrd \
--step 60 \
--start now \
DS:callstot:GAUGE:65:0:U \
DS:callsin:GAUGE:65:0:U \
DS:callsout:GAUGE:65:0:U \
RRA:MIN:0.5:1:10080 \
RRA:AVERAGE:0.5:1:10080 \
RRA:MAX:0.5:1:10080 \
RRA:MIN:0.5:10:14400 \
RRA:AVERAGE:0.5:10:14400 \
RRA:MAX:0.5:10:14400 \
RRA:MIN:0.5:60:24000 \
RRA:AVERAGE:0.5:60:24000 \
RRA:MAX:0.5:60:24000

/usr/bin/rrdtool create /opt/jcallmon/data/calldb.rrd --step 60 --start now \
DS:callstot:GAUGE:65:0:U RRA:MAX:0.5:1:10080 RRA:MAX:0.5:10:14400 RRA:MAX:0.5:60:24000

