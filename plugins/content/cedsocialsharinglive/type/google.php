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

class cedSocialSharingLiveGoogle
{

    public function getMarkup(&$params, $url)
    {
        $counter = "";
        $size = $params->get('googlePlusSize', '');
        $type = $params->get('googlePlusAnnotation', 'google1');
        switch ($type) {
            case "google1" :
                $counter = 'data-annotation="none"';
            break;
            case "google2" :
                $counter = 'data-annotation="bubble" data-counter="right" data-button-shape="square"';
                break;
            case "google3" :
                $counter = 'data-annotation="vertical-bubble" data-height="60""';
                break;
            case "google4" :
                $counter = '';
                break;
        }

        return '<div class="g-plus" data-action="share" '.$size.' '.$counter.'></div>';
    }

    public function addJavascript(&$params)
    {
        $document = JFactory::getDocument();
        $document->addScript('https://apis.google.com/js/platform.js', true, true);
    }


}