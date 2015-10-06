//Web Crawler

  import re, urllib, urllib2, socket

  #proxy = urllib2.ProxyHandler({'http': 'http://#novitageraldine:novitageraldine@cache.itb.ac.id:8080'})
  #auth = urllib2.HTTPBasicAuthHandler()
  #opener = urllib2.build_opener(proxy, auth, urllib2.HTTPHandler)
  #urllib2.install_opener(opener)
  #conn = urllib2.urlopen('http://google.com')
  #return_str = conn.read()

  textfile = file('depth_1.txt','wt')
  print "Enter the URL you wish to crawl.."
  print 'Usage  - "http://www.rumah.com/" <-- With the double quotes'
  myurl = input("@> ")
  urllib.urlretrieve(myurl, "index.html")
  x=1
  for i in re.findall('''href=["'](.[^"']+)["']''', urllib.urlopen(myurl).read(), re.I):
    if i[0]=="h":
      print i  
      try:
        page = urllib2.urlopen(i)
      except urllib2.HTTPError, e:
        print " gabisa"
      fid = str(x) + ".html"  
      urllib.urlretrieve(i, fid)
      x=x+1
      textfile.write(i+'\n')
  textfile.close()
  
 
