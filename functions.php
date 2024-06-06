<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

<<<<<<< HEAD
function themeInit($archive) {
    // Custom initialization code can go here
}

function addCustomFields($layout) {
    $bgColor = new Typecho_Widget_Helper_Form_Element_Text('bgColor', NULL, NULL, _t('气泡背景颜色'), _t('请输入此事件的气泡背景颜色（例如：#ff0000 或 red）'));
    $textColor = new Typecho_Widget_Helper_Form_Element_Text('textColor', NULL, NULL, _t('字体颜色'), _t('请输入此事件的字体颜色（例如：#000000 或 black）'));
    $layout->addItem($bgColor);
    $layout->addItem($textColor);
}

Typecho_Plugin::factory('admin/write-post.php')->fields = 'addCustomFields';
Typecho_Plugin::factory('admin/write-page.php')->fields = 'addCustomFields';
=======
function themeConfig($form) {
    $cssUrl = new Typecho_Widget_Helper_Form_Element_Text('cssUrl', NULL, 'src/style.css', _t('CSS文件路径'), _t('输入CSS文件的URL'));
    $jsUrl = new Typecho_Widget_Helper_Form_Element_Text('jsUrl', NULL, 'src/d3.min.js', _t('D3.js文件路径'), _t('输入D3.js文件的URL'));
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text('faviconUrl', NULL, 'src/favicon.ico', _t('Favicon文件路径'), _t('输入Favicon文件的URL'));
    $form->addInput($cssUrl);
    $form->addInput($jsUrl);
    $form->addInput($faviconUrl);
}
>>>>>>> d3js-timeline
?>
