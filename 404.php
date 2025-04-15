<?php
get_header(); // 加载主题头部
?>
<div class="custom-404-content">
    <h1>页面未找到</h1>
    <p>试试搜索或其他链接。</p>
    <?php get_search_form(); // 显示搜索框 ?>
    <a href="<?php echo home_url(); ?>">返回首页</a>
</div>
<?php
get_footer(); // 加载主题底部