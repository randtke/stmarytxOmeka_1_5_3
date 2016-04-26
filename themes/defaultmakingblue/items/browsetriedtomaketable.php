<?php
$pageTitle = __('Browse Items');
head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id="primary">

    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', total_results()); ?></h1>

    <ul class="items-nav navigation" id="secondary-nav">
        <?php echo custom_nav_items(); ?>
    </ul>
	
	


    <div id="pagination-top" class="pagination"><?php echo pagination_links(); ?></div>
	
<!--	<?php $sortdir=$_GET['sort_dir'];
$sortfield=$_GET['sort_field'];
if($sortfield=='Dublin Core,Date'){
if($sortdir=='d'){
$sortby='Sort by Date (Oldest First)';}
else if($sortdir=='a'||empty($sortdir)){
$sortby='Sort by Date (Newest First)';}
}
else{
$sortby='Sort by Date (Oldest First)';
}
$browseHeadings[$sortby] = 'Dublin Core,Date';
echo browse_headings($browseHeadings); ?>
</br>

<?php $sortdir=$_GET['sort_dir'];
$sortfield=$_GET['sort_field'];
if($sortfield=='Dublin Core,Title'){
if($sortdir=='d'){
$sortby='Sort by Title (A to Z)';}
else if($sortdir=='a'||empty($sortdir)){
$sortby='Sort by Title (Z to A)';}
}
else{
$sortby='Sort by Title (A to Z)';
}
$browseHeadings[$sortby] = 'Dublin Core,Title';
echo browse_headings($browseHeadings); ?>
</br>

<?php $sortdir=$_GET['sort_dir'];
$sortfield=$_GET['sort_field'];
if($sortfield=='Dublin Core,Author'){
if($sortdir=='d'){
$sortby='Sort by Author (A to Z)';}
else if($sortdir=='a'||empty($sortdir)){
$sortby='Sort by Author (Z to A)';}
}
else{
$sortby='Sort by Author (A to Z)';
}
$browseHeadings[$sortby] = 'Dublin Core,Author';
echo browse_headings($browseHeadings); ?>
-->

<?php $sortBy = new SortBy; // requires Sort Browse Results Plugin ?>
<ul class="sort-options">
    <li class="title <?php echo $sortBy->get_cssclass("title"); ?>"><a href="<?php echo $sortBy->get_link('dc.title'); ?>" title="Sort by title">Title</a></li>
    <li class="type <?php echo $sortBy->get_cssclass("type"); ?>"><a href="<?php echo $sortBy->get_link('type'); ?>" title="Sort by type">Type</a></li>
    <li class="date <?php echo $sortBy->get_cssclass("omeka.modified"); ?>"><a href="<?php echo $sortBy->get_link('omeka.modified'); ?>" title="Sort by modified">Date</a></li>
</ul>

<table>
<tr><td><h2>Title</h2></td><td><h2>Date</h2></td><td><h2>Description</h2></td></tr>
    <?php while (loop_items()): ?>
    <div class="item hentry">
        <div class="item-meta">
<tr><td>
        <h2><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?>
			</h2>
			</br>
			        <?php if (item_has_tags()): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo item_tags_as_string(); ?></p>
        </div>
        <?php endif; ?>

        <?php echo plugin_append_to_items_browse_each(); ?>
			
<!--
        <?php if (item_has_thumbnail()): ?>
        <div class="item-img">
            <?php echo link_to_item(item_square_thumbnail()); ?>
        </div>
        <?php endif; ?>
-->
</td><td>
		<div class="item-description">
        <?php echo item('Dublin Core', 'Date'); ?>
</td><td>
		<?php $description = item('Dublin Core', 'Description', array('snippet'=>250)) ?>
        <div class="item-description">
				<?php $bluebookcite = (item('Dublin Core', 'Creator', array('snippet'=>40))) ?>
<?php $bluebookcite .= ", " ?>
<?php $bluebookcite .= (item('Dublin Core', 'Title')) ?>
 <?php $bluebookcite .= ", (" ?>
<?php $bluebookcite .= (item('Dublin Core', 'Date')) ?>
<?php $bluebookcite .= ")." ?>
			<?php echo $bluebookcite ?>
			<?php echo "<br/><br/>" ?>
            <?php echo $description; ?>
</td><td>
        </div>


        </div><!-- end class="item-meta" -->
    </div><!-- end class="item hentry" -->
    <?php endwhile; ?>
</table>

    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>

    <?php echo plugin_append_to_items_browse(); ?>

</div><!-- end primary -->

<?php foot(); ?>
