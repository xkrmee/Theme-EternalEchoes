<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php $this->options->title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 引入 Favicon -->
    <link rel="icon" href="<?php $this->options->faviconUrl(); ?>" type="image/x-icon">

    <!-- 引入 CSS 文件 -->
    <link rel="stylesheet" href="<?php $this->options->cssUrl(); ?>">

    <!-- 引入 D3.js 文件 -->
    <script src="<?php $this->options->jsUrl(); ?>"></script>
</head>
<body>
