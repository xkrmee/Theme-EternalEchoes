<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $cssUrl = new Typecho_Widget_Helper_Form_Element_Text('cssUrl', NULL, 'src/style.css', _t('CSS文件路径'), _t('输入CSS文件的URL'));
    $jsUrl = new Typecho_Widget_Helper_Form_Element_Text('jsUrl', NULL, 'src/d3.min.js', _t('D3.js文件路径'), _t('输入D3.js文件的URL'));
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text('faviconUrl', NULL, 'src/favicon.ico', _t('Favicon文件路径'), _t('输入Favicon文件的URL'));
    $form->addInput($cssUrl);
    $form->addInput($jsUrl);
    $form->addInput($faviconUrl);
}
?>
