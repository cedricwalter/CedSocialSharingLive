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

class cedSocialSharingLiveStumbleUpon
{

    public function getMarkup(&$params, $url)
    {
        $type = $params->get('stumbleuponSize', 'google1');
        $layout = str_replace("stumbleupon", "", $type);

        return '<su:badge layout="'.$layout.'" location="'.$url.'"></su:badge>';
    }

    public function addJavascript(&$params)
    {
        $document = JFactory::getDocument();
        $document->addScript('https://platform.stumbleupon.com/1/widgets.js', true, true);
    }


}