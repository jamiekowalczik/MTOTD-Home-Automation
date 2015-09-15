#!/usr/bin/env python3.2

import os
import datetime
import time
import cronex
import webiopi
import cymysql
import urllib.request
import urllib.parse

dbhost = '127.0.0.1'
dbname = 'mtotd'
dbuser = 'root'
dbpass = 'mtotdmtotd'
tasktable = 'task'
devicetable = 'device'
hubtable = 'hub'

GPIO = webiopi.GPIO

@webiopi.macro
def turnIoTOn():
   os.system('/home/pi/RF24RaspberryCommunicator/remote -m 101')
   return "on"

@webiopi.macro
def turnIoTOff():
   os.system('/home/pi/RF24RaspberryCommunicator/remote -m 100')
   return "off"

@webiopi.macro
def turnOutlet5On():
   os.system('curl http://admin:12345@192.168.2.3/script?run051=run')
   return "Outlet 5 On"

@webiopi.macro
def turnOutlet5Off():
   os.system('curl http://admin:12345@192.168.2.3/script?run053=run')
   return "Outlet 5 Off"

def scheduledEvents():
   try:
      conn = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
      cur = conn.cursor()
      cur.execute('select * from %s' % tasktable)
      for r in cur.fetchall():
         ## Determine if we should take action on event based off of schedule
         eventinfo = '%s %s %s %s %s %s' % (r[6], r[5], r[4], r[3], r[2], r[1])
         if checkIfRunIsNeeded(eventinfo):
            #print('Device: %s' % r[7])
            #print('Device Value for Task: %s' % r[8])
            connDevice = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
            curDevice = connDevice.cursor()
            curDevice.execute('select * from %s where id = %s' % (devicetable,r[7]))
            Device = curDevice.fetchone()
            #print('Device Object Address: %s' % Device[4])
            #print('Hub ID: %s' % Device[2])
            ## Get Sensor IP Address
            connHub = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
            curHub = connHub.cursor()
            curHub.execute('select * from %s where id = %s' % (hubtable,Device[2]))
            hub = curHub.fetchone()
            #print('Hub IP: %s' % hub[2])
            ## Get Object PIN status
            if (Device[3] == 1):
               url = 'http://%s:8000/GPIO/%s/value' % (hub[2],Device[4])
               #print(url)
               res = urllib.request.urlopen(url).read()
               content = res.decode("utf8")
               #print('Current Object Value: %s' % content)
               if (content != r[8]):
                  url = 'http://%s:8000/GPIO/%s/value/%s' % (hub[2],Device[4],r[8])
                                    os.system('curl -X POST %s' % url)
            elif (Device[3] == 2):
               command = '/home/pi/RF24RaspberryCommunicator/remote -m %s%s%s' % (Device[2],Device[4],r[8])
               #print(command)
               os.system(command)
            elif (Device[3] == 3):
               address = Device[4]
               ipaddress = address.split(",")[0]
               outletaddress = address.split(",")[1]
               devval = r[8]
               if ( devval == "0" ):
                  devval = 3
               script = 'run0%s%s=run' % (outletaddress,devval)
               url = 'http://%s/script?%s' % (ipaddress,script)
               print(url)
               os.system('curl %s' % url)
   except :
      pass

def checkIfRunIsNeeded(eventinfo):
   try :
      job = cronex.CronExpression(eventinfo)
      if job.check_trigger(time.gmtime(time.time())[:5]):
         #print(job.comment)
         return True
   except :
      pass

# loop function is repeatedly called by WebIOPi
def loop():
   try :
      scheduledEvents()
      # gives CPU some time before looping again
      #webiopi.sleep(1)
   except :
      pass
