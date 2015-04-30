# Battle.Net OAuth (US) Extension

## Install

1. Download the latest release.
2. Unzip the downloaded release, and copy to your ext folder.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Battle.Net US` under the Disabled Extensions list, and click its `Enable` link.
5. Go to dev.battle.net, login (or register if neccessary).
6. Create a new application for your forum.  
7. Specify the application url as the https url to your site.
8. Specify the callback URL as "https://yoursite/ucp.php?i=ucp_auth_link&mode=auth_link&link=1&oauth_service=battlenet".
(Note that you must be using HTTPS for Battle.Net to produce callback requests to your site.  Without them, oAuth will not work.)
9. Take the key and secret provided for your new application and enter them in ACP under 'Client Communication -> Authentication' in the Battle.Net US fields.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Battle.Net US` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/ajhenderson/battlenet_oauth_us` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

