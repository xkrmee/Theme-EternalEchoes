<?php
<<<<<<< HEAD
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
=======
if (!defined('__TYPECHO_ROOT_DIR__')) exit; // 防止直接访问文件，如果没有定义根目录则退出。
$this->need('header.php'); // 包含头部文件。

// 生成时间线数据
$timelineData = []; // 初始化时间线数据数组
while ($this->next()) { // 遍历文章
    $eventColor = $this->fields->eventColor; // 获取文章的自定义参数 eventColor
    $timelineData[] = [
        'year' => date('Y', $this->created), // 获取文章创建年份
        'event' => htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8'), // 获取文章标题并进行HTML实体编码
        'description' => $this->content, // 获取文章内容，不需要额外转义
        'color' => $eventColor ? $eventColor : '#2196F3' // 如果没有设置 eventColor，使用默认颜色 #2196F3
    ];
}
$jsonData = json_encode($timelineData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); // 将时间线数据编码为 JSON 格式
?>

<div id="content"> <!-- 页面内容的容器 -->
    <div id="timeline"></div> <!-- 时间线的容器 -->

    <script>
    const data = <?php echo $jsonData; ?>; // 将 PHP 生成的 JSON 数据传递给 JavaScript

    console.log(data); // 调试输出

    // 使用 D3.js 创建时间线
    const timeline = d3.select("#timeline"); // 选择时间线的容器

    data.forEach(d => { // 遍历每个时间线事件数据
        const event = timeline.append("div")
            .attr("class", "event") // 创建一个事件 div 并设置 class 属性
            .style("border-left-color", d.color); // 设置左边框颜色

        event.append("h3")
            .text(`${d.year} - ${d.event}`); // 添加事件标题，包括年份和事件名

        event.append("p")
            .html(d.description); // 使用 .html 方法插入 HTML 内容作为事件描述
    });
    </script>
</div> <!-- 结束页面内容的容器 -->

<!-- 分页导航 -->
<nav class="pagination" role="navigation">
    <ul class="pagination-list">
        <?php $this->pageNav('&laquo; Previous', 'Next &raquo;', 3, '...', array(
            'wrapTag' => 'li',
            'wrapClass' => 'page-item',
            'textTag' => 'a',
            'currentClass' => 'active',
            'itemTag' => '',
            'prevClass' => 'prev',
            'nextClass' => 'next',
            'firstClass' => 'first',
            'lastClass' => 'last',
            'moreClass' => 'more'
        )); ?>
    </ul>
</nav>

<?php $this->need('footer.php'); // 包含底部文件。 ?>
>>>>>>> d3js-timeline
