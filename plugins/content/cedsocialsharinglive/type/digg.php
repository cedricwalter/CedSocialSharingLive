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

class cedSocialSharingLiveDigg
{

    public function getMarkup(&$params, $url)
    {
        $type = $params->get('diggButton', 'digg5');

        return '<div class="digg">
        <a href="https://digg.com/submit?phase=2&url='.$url.'&title=Your%20Title&bodytext=Your%20Description&topic=apple"><img src="'.JUri::base().'/media/plg_content_cedsocialsharinglive/'.$type.'.png"></a>
        </div>';
    }

    public function addJavascript(&$params)
    {

    }

}