<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style.css'); ?>">
</head>
<body>
    <div id="wrapper">
        <header id="header" class="text-center py-4 bg-dark text-white">
            <h1><a href="<?php $this->options->siteUrl(); ?>" class="text-white"><?php $this->options->title(); ?></a></h1>
            <p><?php $this->options->description() ?></p>
        </header>
