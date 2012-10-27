# flex2sms

Web front-end to SACFS flex2sms system.

Written by Melchior Mazzone and Evan M. Sanders

## Install Instructions

1. Clone or download and unpack repo.
2. Rename app/Config/core.php.default to core.php
3. Change security key salt values in app/Config/core.php
4. Set debug value to '0' in app/Config/core.php
4. Rename app/Config/database.php.default to database.php
5. Update db config as appropriate.
6. Deploy to your server, remembering to set app/webroot as the DocumentRoot (or equivalent).
