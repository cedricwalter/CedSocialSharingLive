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

//https://developer.linkedin.com/plugins
class cedSocialSharingLiveLinkedIn
{

    public function getMarkup(&$params, $url)
    {
        $counter = "";
        $type = $params->get('xingSize', 'xing1');
        switch ($type) {
            case "linkedin1" :
                $counter = 'data-counter="top"';
                break;
            case "linkedin2" :
                $counter = 'data-counter="right"';
                break;
            case "linkedin3" :
                $counter = '';
                break;

        }

        $document = JFactory::getDocument();
        $document->addScriptDeclaration("
              (function() {
                var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
                li.src = 'https://platform.linkedin.com/in.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
              })();
        ");

        return '<script type="IN/Share" ' . $counter . ' data-url="'.$url.'"></script>';
    }

    public function addJavascript(&$params)
    {
    }

}