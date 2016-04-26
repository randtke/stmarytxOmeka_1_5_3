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
<?php $sortBy = new SortBy; // requires Sort Browse Results Plugin ?>

<table>
<tr><th width="20%"><h2>Title</h2></br><a href="<?php echo $sortBy->get_link('dc.title'); ?>" title="Sort by title">Sort by Title</a></th><th width="10%"><h2>Date</h2></br><a href="<?php echo $sortBy->get_link('dc.date'); ?>" title="Sort by modified">Sort by Date</a></th><th width="15%"><h2>Author</h2></br><a href="<?php echo $sortBy->get_link('dc.creator'); ?>" title="Sort by modified">Sort by Author</a></th><th><h2>Description</h2></th></tr>
    <?php while (loop_items()): ?>
<tr><td>
    <!-- begin class itemhentry -->
        <div class="item-description">

        <?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?>
		</td><td>

<?php echo (item('Dublin Core', 'Date')); ?>
</td><td>
<?php echo (item('Dublin Core', 'Creator')); ?>
</td><td>
		 
		<?php if (item_has_thumbnail()): ?>
        <div class="item-description">
		<?php echo "<strong>Thumbnail:</strong></br> "; ?>
            <?php echo link_to_item(item_square_thumbnail()); ?>
        </div>
        <?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
        <div class="item-description">
		<?php echo "<strong>Description:</strong> "; ?>
            <?php echo $description; ?>
        </div>
		<?php elseif ($textsnippet = item('PDF Search', 'Text', array('snippet'=>250))): ?>
		<div class="item-description">
		<?php echo "<strong>Excerpt:</strong> </br></br>"; ?>
            <?php echo $textsnippet; ?>
        </div>
        <?php endif; ?>
		
<!-- Requires a modification to plugins/PdfSearch/PdfSearchPlugin.php to not hide PDF fulltext from the public interface
-->
		
<!--
 <?php if (item_has_tags()): ?>
        <div class="item-description"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo item_tags_as_string(); ?></p>
        </div>
        <?php endif; ?>
        <?php echo plugin_append_to_items_browse_each(); ?>
-->
		</td></tr>

        </div><!-- end class="item-meta" -->
    <!-- end class="item hentry" -->
    <?php endwhile; ?>
</table>

    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>

    <?php echo plugin_append_to_items_browse(); ?>

</div><!-- end primary -->

<?php foot(); ?>
