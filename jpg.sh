#!/bin/bash

wget -r -l 1 -nd -P /home/alfianwira/Templates/jpg -A jpg http://stei.itb.ac.id/
rsync -u -r /home/alfianwira/Templates/jpg /home/alfianwira/Templates/jpg-backup 


