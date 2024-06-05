<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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
?>
