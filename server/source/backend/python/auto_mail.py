import mysql.connector
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import time
import datetime

### INITIALIZE CONNECTION TO SQL HOST ###

def innit_conn(query, host='127.0.0.1', user='root', password='M12n2B3v4!', database='financedb'):
 
    db = mysql.connector.connect(
        host=host,
        user=user,
        password=password,
        database=database 
    )
    if not db.is_connected():
        raise ConnectionRefusedError(f'Connection to Host: {host}, user {user}, failed.')

    cursor = db.cursor()

    cursor.execute(query)

    result = cursor.fetchall()
    return result

### SEND AUTOMATIC EMAIL ###

def send_email(email, body, subject):
    '''
    Gmail's SMTP server
    587 is the port for TLS encryption
    '''
    server = 'smtp.gmail.com'
    port = 587
    sender = 'tyrost9@gmail.com'
    password = 'ksdcflhwpxelzpcc' # Google Generated App Password #

    msg = MIMEMultipart()
    msg['From'] = sender
    msg['To'] = email
    msg['Subject'] = subject

    msg.attach(MIMEText(body))

    try:
        # Connection to SMTP's Gmail server #
        server = smtplib.SMTP(server, port)
        server.starttls()
        server.login(sender, password)

        msg = MIMEMultipart()
        msg['From'] = sender
        msg['To'] = email
        msg['Subject'] = subject

        msg.attach(MIMEText(body))

        server.sendmail(sender, email, msg.as_string())

    except Exception as e:

        print(f"Failed to send email: {e}")

    finally:

        server.quit()

def execute_task():

    current_date = datetime.date.today()

    query = 'SELECT * FROM newsletter'
    
    data = innit_conn(query)

    for user in data:
        name, email = user[1], user[2]

        body_message = (f"Hello {name}!\n"
                        "This is a test message for our newly created Finance World Website!\n"
                        "Feel free to ignore this message... for now :)\n\n"
                        "Best,\n"
                        "C. Daniel Corzo")

        send_email(email=email, body=body_message, subject=f'Monthly Newsletter - Finance World ({current_date}) TEST!')

# execute_task()


