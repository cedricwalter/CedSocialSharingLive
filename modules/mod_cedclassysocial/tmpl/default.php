<?php

// no direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addScript(JUri::base().'/media/mod_cedclassysocial/jquery.classysocial.min.js?v=3.4.2');
$document->addStyleSheet(JUri::base().'/media/mod_cedclassysocial/css/jquery.classysocial.min.css?v=3.4.2');
$uuid = "classysocial";//.uniqid();
$document->addScriptDeclaration("jQuery(document).ready(function(){ jQuery('.$uuid').ClassySocial(); });");

?>

<div class="module<?php echo $moduleclass_sfx ?>">
    <!-- Copyright (C) 2013-2016 galaxiis.com All rights reserved. -->
    <div class="<?php echo $uuid?>" id="<?php echo $uuid?>"
         data-theme="<?php echo $theme ?>"
         data-image-type="facebook"
         data-picture="cedric.walter"
         data-gap="<?php echo $gap ?>"
         data-arc-start="<?php echo $arcStart ?>"
         data-arc-length="<?php echo $arcLength ?>"
         data-radius="<?php echo $radius ?>"
        <?php echo $dataNetwork ?>
         data-orientation="<?php echo $orientation ?>"
         data-networks="<?php echo $networks ?>">
    </div>
</div>
