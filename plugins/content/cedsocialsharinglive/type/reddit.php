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

//https://www.reddit.com/r/digg/buttons/
class cedSocialSharingLiveReddit
{

    public function getMarkup(&$params, $url)
    {
        $type = $params->get('redditButton', 'reddit2');
        $i = str_replace("reddit", "",$type);
        return '<div class="reddit"><script type="text/javascript" src="https://www.reddit.com/static/button/button'.$i.'.js"></script></div>';
    }

    public function addJavascript(&$params)
    {

    }


}