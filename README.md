Pagemap Imagewall Gallery
************************

### ABOUT
Pagemap ImageWall Gallery is a web gallery script, free for private and commercial use, originally developed by Pagemap Premium Portfolios in Germany, and adapted for mobile devices (& retina screen) by Kris

Demo kris : https://xoofoo.org/demo/pagemapgallery/

### SYSTEM REQUIREMENTS
- Apache Webserver (recommended) or IIS
- PHP version 4.3 or greater
- PHP extension GDLib

### INSTALLATION
- Download a copy from https://github.com/krisxoofoo/Pagemap-ImageWall-Gallery/archive/master.zip and unpack it on your webserver.
- Open your web browser and go to the script at http://www.yourdomain.com/index.php
- That's it. If you want to configure the script see next chapters.

### UNINSTALL
Just rename the file index.php to uninstall.php and run the script.
It will delete the cache directory and the config.txt if you are not able to do this via FTP.

### CONFIGURATION
You can change the look and feel of the gallery in many ways.
Create a config.ini in the same directory as Pagemap ImageWall

### EMBEDDING
If you want to include the script (index.php) in a custom PHP file set Config Tag [Embedded Script'] to "on" and use $set['script name'] in your script to define the path to the Pagemap ImageWall script. You can optional define a root path for config file and default images dir with $set['script dir'].

### TROUBLESHOOTING
If you are having problems installing or using Pagemap Imagewall Gallery, please post issue here: https://github.com/krisxoofoo/Pagemap-ImageWall-Gallery/issues

### LEGAL INFORMATION
Pagemap Imagewall is originally written by Nico Wenig
Copyright © 2010 by Pagemap Premium Portfolios. All rights reserved.

The software is provieded as is, without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from
out of or in connectioin with the software or the use of other dealings in the software.

### TERMS OF USE:
You are allows to:
- Use for private and commercial
- Copy and distribute the script
- Customize the function and design

You are NOT allowed to:
- Claim the script as your own
- Sale parts of the script

### CREDITS:
- Nico Wenig for initial code
- V Song for Page navigation
- Rafael Paulino for cache system
- jQuery Team
- Sara Soueidan for Responsive jQuery Gallery Plugin with CSS3 Animations
- Drew Wilson for jQuery Tip Tip