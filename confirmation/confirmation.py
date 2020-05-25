#imports

import os
import sys
import smtplib
import imghdr
from email.message import EmailMessage

#get uniqe ID

if len(sys.argv) > 1:
    uniqueID = sys.argv[1]
    email = sys.argv[2]
    fname = sys.argv[3]
    lname = sys.argv [4]

#compose email

msg_template = f'Hi {fname} {lname} \n Thank you for registering for EventName \n Please find attached your QR ticket that will be scanned at the doors of the event'


msg = EmailMessage()
msg['Subject'] = 'Subject'
msg['From'] = 'Sending Email'
msg['To'] = email
msg.set_content(msg_template)

with open ('./eventfolder/'+uniqueID+'.png', 'rb') as f:
    file_data = f.read()
    file_type = imghdr.what(f.name)
    file_name = f.name

msg.add_attachment(file_data, maintype='image', subtype=file_type, filename='ticket.png')    

with smtplib.SMTP('your_smtp_server', 587) as smtp:
    smtp.ehlo()
    smtp.starttls()
    smtp.ehlo()

    smtp.login('email/username', 'password')

    smtp.send_message(msg)