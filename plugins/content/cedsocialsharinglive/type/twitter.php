<?php
/**
 * @package     CedSocialSharingLive
 * @subpackage  com_cedsocialsharinglive
 *
 * @copyright   Copyright (C) 2013-2016 galaxiis.com All rights reserved.
 * @license     The author and holder of the copyright of the software is Cédric Walter. The licensor and as such issuer of the license and bearer of the
 *              worldwide exclusive usage rights including the rights to reproduce, distribute and make the software available to the public
 *              in any form is Galaxiis.com
 *              see LICENSE.txt
 **/

defined('_JEXEC') or die('Restricted access');

class cedSocialSharingLiveTwitter
{

    public function getMarkup(&$params, $url)
    {
        $type = $params->get('twitterCount', 'twitter3');
        $twitterName = $params->get('twitterName', '');
        $twitterLocale = $params->get('twitterLocale', '');
        $twitterSize = $params->get('twitterSize', 'size1');
        $size = "";
        switch ($twitterSize) {
            case "size2" :
                $size = "data-size='large'";
                break;
        }

        $counter = "";
        switch ($type) {
            case "twitter1" :
                $counter = 'data-counter="none"';
            break;
            case "twitter2" :
                $counter = 'data-counter="horizontal"';
            break;
            case "twitter3" :
                $counter = 'data-counter="vertical"';
            break;
        }


        return "<a href=\"https://twitter.com/share\"
                    data-count=\"".$counter."\"
                     ".$size."
                    class=\"twitter-share-button\"
                    data-url=\"https://www.galaxiis.com\"
                    ".$twitterSize."
                    data-via=\"" . $twitterName ."\"
                    data-lang=\"" . $twitterLocale ."\"
                    data-dnt=\"true\">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
    }

    public function addJavascript(&$params)
    {

    }

}