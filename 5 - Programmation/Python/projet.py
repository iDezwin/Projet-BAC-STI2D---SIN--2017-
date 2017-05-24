#!/usr/bin/env python
# -*- coding: utf-8 -*-

import RPi.GPIO as GPIO
from twilio.rest import Client
import time
import datetime
import MySQLdb
import grovepi


GPIO.setmode(GPIO.BOARD)
GPIO.setup(8, GPIO.OUT)
GPIO.setup(10, GPIO.OUT)
GPIO.setup(12, GPIO.OUT)
GPIO.setup(16, GPIO.IN)
relay = 2
grovepi.pinMode(relay,"OUTPUT")

db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                    user="root",         # your username
                   passwd="XXXXXXX",  # your password
                    db="projet")        # name of the data base

        #Identification Twilio
account_sid = "ACfec2819a1b1673fe9caa78fead2c20b0" # Your Account SID from www.twilio.com/console
auth_token  = "dd08ce2224fb927aa060249b93a9bcba"  # Your Auth Token from www.twilio.com/console
client = Client(account_sid, auth_token)


cursor = db.cursor()
cursor.execute("SELECT mode FROM test")
mode= cursor.fetchone()

def auto():
	day = datetime.datetime.now()
	day = day.isoweekday()

        if day == 1:
            
            print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 1")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 1")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 1")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 1")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
            	grovepi.digitalWrite(relay,1)
            	print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)

                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


	if day == 2:
            
	    print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 2")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 2")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 2")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 2")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
            	cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
            	grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


	if day == 3:
            
			print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 3")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 3")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 3")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 3")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


        if day == 4:
            
            print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 4")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 4")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 4")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 4")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


        if day == 5:
            
            print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 5")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 5")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 5")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 5")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


        if day == 6:
            
            print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 6")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 6")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 6")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 6")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


        if day == 7:
            
            print("Mode automatique")

            midnight = datetime.datetime.combine(datetime.date.today(), datetime.time.min)
            now_relative = datetime.datetime.now() - midnight

            heure_now = datetime.datetime.now().time().hour * 3600
            minute_now = datetime.datetime.now().time().minute * 60
            seconde_now = datetime.datetime.now().time().second

            time_now = heure_now + minute_now + seconde_now

                
            print time.strftime("%H:%M:%S")

            cursor = db.cursor()

            cursor.execute("SELECT heure_o FROM test WHERE id = 7")
            heure_o = cursor.fetchone()
            heure_o = heure_o[0] * 3600

            cursor.execute("SELECT minute_o FROM test WHERE id = 7")
            minute_o= cursor.fetchone()       
            minute_o= minute_o[0] * 60

            heure_ouverture = minute_o + heure_o

            cursor.execute("SELECT heure_f FROM test WHERE id = 7")
            heure_f= cursor.fetchone()
            heure_f= heure_f[0] * 3600

            cursor.execute("SELECT minute_f FROM test WHERE id = 7")
            minute_f= cursor.fetchone()
            minute_f= minute_f[0] * 60

            heure_fermeture = minute_f + heure_f


            if time_now == heure_ouverture:
                message = client.messages.create(body="Portail en cours d'ouverture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now == heure_fermeture:
                message = client.messages.create(body="Portail en cours de fermeture",
                to="+33630688362",    # Replace with your phone number
                from_="+33644644159 ") # Replace with your Twilio number

            if time_now > heure_ouverture and time_now < heure_fermeture:
                etat = 1
                cursor.execute("UPDATE test SET etat = 1 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,1)
                print("Etat du portail : Ouvert")
            	GPIO.output(12, False)
            	GPIO.output(8, True)
            	GPIO.output(10, False)
                    
            else:
                etat = 0
                print("Etat du portail : Fermé")
                cursor.execute("UPDATE test SET etat = 0 ")
                db.commit()
                db.rollback()
                grovepi.digitalWrite(relay,0)
            	GPIO.output(12,True)
            	GPIO.output(8, False)
            	GPIO.output(10, False)


def manuel():

	print("Mode manuel")
	cursor = db.cursor()
	cursor.execute("SELECT etat FROM test")
	etat= cursor.fetchone()
	if etat[0] == 0:
		print("Etat du portail : Fermé")
		grovepi.digitalWrite(relay,0)
		GPIO.output(12,True)
		GPIO.output(8, False)
		GPIO.output(10, False)
	else:
		print("Etat du portail : Ouvert")
		grovepi.digitalWrite(relay,1)
		GPIO.output(12, False)
		GPIO.output(8, True)
		GPIO.output(10, False)

def default():
    GPIO.output(8, False)
    GPIO.output(10, True)
    GPIO.output(12, False)

    cursor = db.cursor()
    cursor.execute("SELECT defaut FROM test")
    defaut = cursor.fetchone()

    if defaut[0] == 0:
        #message = client.messages.create(body="Défaut portail, intervention nécessaire !",
        #to="+33630688362",    # Replace with your phone number
        #from_="+33644644159") # Replace with your Twilio number
        
        cursor = db.cursor()
        cursor.execute("UPDATE test SET defaut = 1 ")
        db.commit()
        db.rollback()



	

while True:
	cursor = db.cursor()
	cursor.execute("SELECT mode FROM test")
	mode = cursor.fetchone()
	cursor = db.cursor()
	cursor.execute("SELECT etat FROM test")
	etat = cursor.fetchone()

	if mode[0] == 0:
		auto ()

       		if (GPIO.input(16) == True):
                    while GPIO.input(16) == True:
                    	default()
                    	print("Défaut portail !")
        	else:
            		cursor.execute("UPDATE test SET defaut = 0 ")
            		db.commit()
            		db.rollback()
	else:
        	manuel()
        	if (GPIO.input(16) == True):
            		while GPIO.input(16) == True:
            			print("Défaut Portail ! ")
                    	default()

        	else:
            		cursor.execute("UPDATE test SET defaut = 0 ")
            		db.commit()
            		db.rollback()
	
