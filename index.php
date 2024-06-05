<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>

<div id="content" class="container mt-5">
    <div id="time-machine">
        <?php
        // 显示所有文章及其时间
        $this->widget('Widget_Archive', 'type=post')->to($archives);
        while($archives->next()):
            $bgColor = $archives->fields->bgColor ? $archives->fields->bgColor : '#ffffff'; // 默认背景颜色为白色
            $textColor = $archives->fields->textColor ? $archives->fields->textColor : '#000000'; // 默认字体颜色为黑色
        ?>
            <div class="post card mb-4 shadow-sm" style="background-color: <?php echo $bgColor; ?>; border-radius: 25px;">
                <div class="card-body" style="color: <?php echo $textColor; ?>; border-radius: 25px;">
                    <h2 class="card-title" style="color: <?php echo $textColor; ?>;"><?php $archives->title() ?></h2>
                    <p class="post-time" style="color: <?php echo $textColor; ?>;"><?php $archives->date('Y-m-d H:i'); ?></p>
                    <div class="post-content">
                        <?php $archives->content(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
