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

class cedSocialSharingLivePinterest
{

    public function getMarkup(&$params, $url)
    {
        $type = $params->get('pinterestButton', 'pinterest2');
        $color = '';
        $height = '';
        switch ($type) {
            case "pinterest1" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_28.png';
                $color = '';
                $height = 'data-pin-height="28"';
                break;
            case "pinterest2" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png';
                $color = 'data-pin-color="red"';
                $height = 'data-pin-height="28"';
                break;
            case "pinterest3" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_28.png';
                $color = 'data-pin-color="white"';
                $height = 'data-pin-height="28"';
                break;
            case "pinterest4" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png';
                $color = '';
                break;
            case "pinterest5" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png';
                $color = 'data-pin-color="red"';
                break;
            case "pinterest6" :
                $counter = 'https://assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png';
                $color = 'data-pin-color="white"';
                break;
        }

        return '<div class="pinterest"><a href="//www.pinterest.com/pin/create/button/?url='.$url.'&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" '.$color.' data-pin-config="above" '.$height.'><img src="'.$counter.'" /></a></div>';
    }

    public function addJavascript(&$params)
    {
        $document = JFactory::getDocument();
        $document->addScriptDeclaration("
              (function() {
                var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
                li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//assets.pinterest.com/js/pinit.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
              })();
        ");
    }

}