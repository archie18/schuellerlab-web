#!/bin/bash

# Delete result directories older than 7 days
cd /Library/WebServer/Documents/schuellerlab/web/dr_sasa/
find * -mtime +6 -delete
