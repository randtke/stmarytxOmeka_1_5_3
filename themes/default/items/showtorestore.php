<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<div id="primary">

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

	<?php if ($author = item('Dublin Core', 'Creator')): ?>
	<h3>Creator</h3><p><?php echo $author ; ?></p>
	<?php endif; ?>
	
	<?php if ($date = item('Dublin Core', 'Date')): ?>
	<h3>Date</h3><p><?php echo $date ; ?></p>
	<?php endif; ?>
	
	
	<!-- php echo custom_show_item_metadata(); ?> -->

    <!-- The following returns all of the files associated with an item. -->
    <div id="itemfiles" class="element">
        <h3><?php echo __('Download Files:'); ?></h3>
        <div class="element-text"><?php echo display_files_for_item(); ?></div>
    </div>
	
	<!--  Show the description -->
        <?php if ($description = item('Dublin Core', 'Description', array('snippet'=>255))): ?>
        <div class="item-description">
		<?php echo "<h3>Description:</h3> "; ?>
            <?php echo '<p>' . $description . '</p>'; ?>
        </div>
        <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (item_belongs_to_collection()): ?>
    <div id="collection" class="element">
        <h3><?php echo __('Collection'); ?></h3>
        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
    </div>
    <?php endif; ?>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (item_has_tags()): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo item_tags_as_string(); ?></div>
    </div>
    <?php endif;?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo item_citation(); ?></div>
    </div>

    <?php echo plugin_append_to_items_show(); ?>

    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item(); ?></li>
    </ul>

</div><!-- end primary -->

<?php foot(); ?>
