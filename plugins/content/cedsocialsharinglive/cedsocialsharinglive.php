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

jimport('joomla.plugin.plugin');
jimport('joomla.language.helper');

class plgContentCedSocialSharingLive extends JPlugin
{

    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    public function onContentPrepare($context, &$article, &$params, $limitstart)
    {
        //Do not run in admin area and non HTML  (rss, json, error)
        $app = JFactory::getApplication();
        if ($app->isAdmin() || JFactory::getDocument()->getType() !== 'html')
        {
            return true;
        }

        $showInIntro = $this->params->get('showInIntro', '0');
        $showFrontpage = $this->params->get('showFrontpage');
        $locale = JLanguageHelper::detectLanguage();
        //there is not any more section in joomla! 1.6
        $selectedCategoryId = $this->params->get('categoryId');


        //do not trigger everywhere for example not for modules
        if (($context == 'com_content.article') && array_key_exists('catid', $article)) {
            if ($this->isActiveInCategory($selectedCategoryId, $article->catid) || $this->isVisibleInFrontpage($article)
            ) {

                $document = JFactory::getDocument();
                $style = $this->params->get('style', 'left.css');
                $document->addStyleSheet(JUri::base().'/media/plg_content_cedsocialsharinglive/' . $style. '?v=3.4.2');

                $socialSharingHtml = $this->getSocialSharingHtml($article);

                $position = $this->params->get('position');
                if ($position) {
                    $article->text = $article->text . $socialSharingHtml;
                } else {
                    $article->text = $socialSharingHtml . $article->text;
                }
            }
        }

        return true;
    }

    function getSocialSharingHtml(&$article)
    {
        $html = '<!-- Copyright (C) 2013-2016 galaxiis.com All rights reserved. -->
        <div class="cedsocialsharinglive">';
        $articleRoute = $this->getArticleRoute($article);

        if (intval($this->params->get('twitterVisible'))) {
            require_once(dirname(__FILE__) . '/type/twitter.php');
            $twitter = new cedSocialSharingLiveTwitter();
            $twitter->addJavascript($this->params);
            $html .= $twitter->getMarkup($this->params, $articleRoute);
        }

        if (intval($this->params->get('facebookVisible'))) {
            require_once(dirname(__FILE__) . '/type/facebook.php');
            $facebook = new cedSocialSharingLiveFacebook();
            $facebook->addJavascript($this->params);
            $html .= $facebook->getMarkup($this->params, $articleRoute);
        }

        if ($this->params->get('linkedInVisible')) {
            require_once(dirname(__FILE__) . '/type/linkedin.php');
            $linkedIn = new cedSocialSharingLiveLinkedIn();
            $linkedIn->addJavascript($this->params);
            $html .= $linkedIn->getMarkup($this->params, $articleRoute);
        }

        if ($this->params->get('xingVisible')) {
            require_once(dirname(__FILE__) . '/type/xing.php');
            $google = new cedSocialSharingLiveXing();
            $google->addJavascript($this->params);
            $html .= $google->getMarkup($this->params, $articleRoute);
        }

        if ($this->params->get('redditVisible')) {
            require_once(dirname(__FILE__) . '/type/reddit.php');
            $reddit = new cedSocialSharingLiveReddit();
            $reddit->addJavascript($this->params);
            $html .= $reddit->getMarkup($this->params, $articleRoute);
        }

        if ($this->params->get('pinterestVisible')) {
            require_once(dirname(__FILE__) . '/type/pinterest.php');
            $pinterest = new cedSocialSharingLivePinterest();
            $pinterest->addJavascript($this->params);
            $html .= $pinterest->getMarkup($this->params, $articleRoute);
        }

        if (intval($this->params->get('diggVisible'))) {
            require_once(dirname(__FILE__) . '/type/digg.php');
            $digg = new cedSocialSharingLiveDigg();
            $digg->addJavascript($this->params);
            $html .= $digg->getMarkup($this->params, $articleRoute);
        }

        if (intval($this->params->get('stumbleuponVisible'))) {
            require_once(dirname(__FILE__) . '/type/stumbleupon.php');
            $stumbleupon = new cedSocialSharingLiveStumbleUpon();
            $stumbleupon->addJavascript($this->params);
            $html .= $stumbleupon->getMarkup($this->params, $articleRoute);
        }

        if ($this->params->get('googlePlusVisible', 1)) {
            require_once(dirname(__FILE__) . '/type/google.php');
            $google = new cedSocialSharingLiveGoogle();
            $google->addJavascript($this->params);
            $html .= $google->getMarkup($this->params, $articleRoute);
        }

        $html .= '</div>';

        return $html;
    }


    /**
     * add a javascript in head asynchronously for btter performance and non blocking page load
     * @param unknown_type $script
     */
    function addScriptAsynchronously($script)
    {
        $document = JFactory::getDocument();
        //$document->addStyleSheet("media/plg_relatedThumbItems/muticolumn/mooColumns.css");
        //$document->addScript(JURI :: base()."media/plg_relatedThumbItems/muticolumn/MooColumns_0.67.js");
        $document->addScriptDeclaration("(function() {
					var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
					s.type = 'text/javascript';
					s.async = true;
					s.src = '" . $script . "';
					s1.parentNode.insertBefore(s, s1);
					})();");
    }

    public function getArticleRoute($article, $encode = false)
    {
        $uri = JURI::getInstance();
        $prefix = $uri->toString(array('scheme', 'host', 'port'));
        $uri = JURI::getInstance();
        $base = $uri->toString(array('scheme', 'host', 'port'));
        $link = $base . JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid), false);
        if ($encode) {
            return urlencode(htmlentities($link));
        }
        return $link;
    }


    function isVisibleInIntro(&$obj)
    {
        if ($this->showInIntro) {
            $view = JRequest :: getVar('view');
            return $view == 'article';
        }
        return false;
    }

    function isVisibleInFrontpage($showFrontpage)
    {
        if ($showFrontpage) {
            $view = JRequest :: getVar('view');
            return $view == 'frontpage';
        }
        return false;
    }

    public function isActiveInCategory($selectedCategories, $articleCategoryID)
    {
        if ($selectedCategories == null) {
            return false;
        }

        $match = false;
        if (is_array($selectedCategories)) {
            foreach($selectedCategories as $category)
            {
                if ($category === "") { // all category is in the list
                    return true;
                }
                if (strcmp(trim($category), $articleCategoryID) == 0) {
                    $match = true;
                }
            }
        }

        return $match;
    }

}

?>