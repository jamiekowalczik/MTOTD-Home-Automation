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
eventstable = 'scheduledevents'
sensorobjectstable = 'sensorobjects'
sensorstable = 'sensors'

GPIO = webiopi.GPIO

def scheduledEvents():
   try:
      conn = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
      cur = conn.cursor()
      cur.execute('select * from %s' % eventstable)
      for r in cur.fetchall():
         ## Determine if we should take action on event based off of schedule
         eventinfo = '%s %s %s %s %s %s' % (r[7], r[6], r[5], r[4], r[3], r[1])
         if checkIfRunIsNeeded(eventinfo):
            #print('Get Sensor Connection information and change GPIO status if needed')
            #print('Sensor: %s' % r[8])
            #print('Sensor Value for Event: %s' % r[9])
            ## Get Sensor PIN and Sensor ID
            connSensorObject = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
            curSensorObject = connSensorObject.cursor()
            curSensorObject.execute('select * from %s where id = %s' % (sensorobjectstable,r[8]))
            sensorObject = curSensorObject.fetchone()
            #print('Sensor Object PIN: %s' % sensorObject[2])
            #print('Sensor ID: %s' % sensorObject[1])
            ## Get Sensor IP Address
            connSensor = cymysql.connect(host='%s' % dbhost, user='%s' % dbuser, passwd='%s' % dbpass, db='%s' % dbname, charset='utf8')
            curSensor = connSensor.cursor()
            curSensor.execute('select * from %s where id = %s' % (sensorstable,sensorObject[1]))
            sensor = curSensor.fetchone()
            #print('Sensor IP: %s' % sensor[4])
            ## Get Object PIN status
            url = 'http://%s:8000/GPIO/%s/value' % (sensor[4],sensorObject[2])
            #print(url)
            res = urllib.request.urlopen(url).read()
            content = res.decode("utf8")
            #print('Current Object Value: %s' % content)
            if (content != r[9]):
               url = 'http://%s:8000/GPIO/%s/value/%s' % (sensor[4],sensorObject[2],r[9])
               os.system('curl -X POST %s' % url)
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
      webiopi.sleep(1)
   except :
      pass
