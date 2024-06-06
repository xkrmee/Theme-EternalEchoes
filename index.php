<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

// 生成时间线数据
$timelineData = [];
$this->widget('Widget_Contents_Post_Recent', 'pageSize=20')->to($posts);
while ($posts->next()) {
    $timelineData[] = [
        'year' => date('Y', $posts->created),
        'event' => htmlspecialchars($posts->title, ENT_QUOTES, 'UTF-8'),
        'description' => $posts->content // 不需要额外的转义，因为已经是 HTML
    ];
}
$jsonData = json_encode($timelineData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
?>

<div id="timeline"></div>

<script>
const data = <?php echo $jsonData; ?>;

console.log(data); // 调试输出

// 确保 d3.js 正确加载
if (typeof d3 === 'undefined') {
    console.error('d3.js 没有正确加载');
} else {
    const timeline = d3.select("#timeline");

    data.forEach(d => {
        const event = timeline.append("div")
            .attr("class", "event");

        event.append("h3")
            .text(`${d.year} - ${d.event}`);

        event.append("p")
            .html(d.description); // 使用 .html 方法插入 HTML 内容
    });
}
</script>

<?php $this->need('footer.php'); ?>