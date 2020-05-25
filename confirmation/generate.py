

import os
import sys
import qrcode

#get id from php form

if len(sys.argv) > 1:
    uniqueID = sys.argv[1]
    fname = sys.argv[2]
    lname = sys.argv[3]
    email = sys.argv[4]

#get name based on ID



#generate json for code

json = '{"ronaTicket":{"id":"'+uniqueID+'","name":"'+fname+' '+lname+'"}}'

#create qr code

qr = qrcode.QRCode()
qr.add_data(json)
qr.make()
img = qr.make_image()
img.save('./eventfolder/{}.png'.format(uniqueID))


#execute email script with uniqe ID

os.system('python3 confirmation.py '+uniqueID+ ' ' +email+ ' ' +fname+ ' ' +lname)
