# Tugas 2 Client dapat mengirimkan pesan berupa teks ke server dan server dapat menerima dan membalas pesan dari client
# 18213042-18213043
Tugas Kelompok Pemrograman Integratif

import SocketServer

class MyTCPHandler(SocketServer.BaseRequestHandler):
    def handle(self):
        self.data = self.request.recv(1024).strip()
        print("{} wrote:".format(self.client_address[0]))
        print(self.data)
        self.request.sendall(self.data.upper())

if __name__ == "__main__":
    HOST, PORT = "localhost", 8088

    server = SocketServer.TCPServer((HOST, PORT), MyTCPHandler)

    server.serve_forever()
