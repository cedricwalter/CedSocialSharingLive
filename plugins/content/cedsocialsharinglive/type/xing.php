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

//https://dev.xing.com/plugins/share_button
class cedSocialSharingLiveXing
{

    public function getMarkup(&$params, $url)
    {
        $counter = "";
        $type = $params->get('xingSize', 'xing1');
        switch ($type) {
            case "xing1" :
                $counter = 'data-counter="top"';
            break;
            case "xing2" :
                $counter = 'data-counter="right" data-button-shape="square"';
                break;
            case "xing3" :
                $counter = 'data-counter="right"';
                break;
            case "xing4" :
                $counter = 'data-counter="no_count" data-button-shape="square"';
                break;
            case "xing5" :
                $counter = 'data-counter="no_count"';
                break;
            case "xing6" :
                $counter = 'data-counter="no_count" data-button-shape="small_square"';
                break;
        }

        return '<div data-type="XING/Share" ' . $counter . ' data-url="'.$url.'"></div>';
    }


    public function addJavascript(&$params)
    {
	    $document = JFactory::getDocument();
	    $document->addScript('www.xing-share.com/js/external/share.js', true, true);
    }

}