#!/bin/bash
php insert_text.php
#gnome 2
#gconftool --type String --set /desktop/gnome/background/picture_filename file:///home/tran/Pictures/wallpapers/active.jpg
#gnome 3
gsettings set org.gnome.desktop.background picture-uri file:///home/tran/Pictures/wallpapers/active.jpg
