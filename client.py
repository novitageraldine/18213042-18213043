# Tugas 1 Client dapat mengirimkan pesan berupa teks ke server dan server dapat menerima pesan dari client

import socket
import sys

HOST, PORT = "localhost", 8088
data = " ".join(sys.argv[1:])

sock = socket.socket(socket.AF_INET, 

socket.SOCK_STREAM)

try:
    sock.connect((HOST, PORT))
    sock.sendall(data + "\n")

    received = sock.recv(1024)
finally:
   

 sock.close()

print("Sent:     {}".format(data))
print("Received: {}".format(received))
