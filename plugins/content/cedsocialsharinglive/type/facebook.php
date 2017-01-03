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

//https://developers.facebook.com/docs/plugins/share-button/
class cedSocialSharingLiveFacebook
{

    public function getMarkup(&$params, $url)
    {
        $counter = "";
        $type = $params->get('facebookButton', 'facebook1');
        switch ($type) {
            case "facebook1" :
                $counter = 'data-type="box_count"';
            break;
            case "facebook2" :
                $counter = 'data-type="button_count"';
                break;
            case "facebook3" :
                $counter = 'data-type="button"';
                break;
            case "facebook4" :
                $counter = 'data-type="icon_link"';
                break;
            case "facebook5" :
                $counter = 'data-type="icon"';
                break;
            case "facebook6" :
                $counter = 'data-type="link"';
                break;

        }

        $html = '<div class="facebook"><div class="fb-share-button" data-href="'.$url.'" '.$counter.'></div>';
        $html .= '<div id="fb-root"></div>
                    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=104247459622740&version=v2.0";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script></div>';

        return $html;
    }

    public function addJavascript(&$params)
    {
    }


}