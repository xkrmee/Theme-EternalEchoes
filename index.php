<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');

$timelineData = [];
$this->widget('Widget_Contents_Post_Recent', 'pageSize=20')->to($posts);
while ($posts->next()) {
    $timelineData[] = [
        'year' => date('Y', $posts->created),
        'event' => $posts->title,
        'description' => $posts->content
    ];
}

$jsonData = json_encode($timelineData);
?>

<div id="timeline"></div>

<script>
const data = <?php echo $jsonData; ?>;

console.log(data); // 调试输出

const timeline = d3.select("#timeline");

data.forEach(d => {
    const event = timeline.append("div")
        .attr("class", "event");

    event.append("h3")
        .text(`${d.year} - ${d.event}`);

    event.append("p")
        .text(d.description);
});
</script>

<?php
$this->need('footer.php');
?>
