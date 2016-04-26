<?php head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="splashimage">
<p><img src="<?php echo img('270talltrimmed.jpg'); ?>" alt="A photograph of the Sarita Kenedy East Law Library Rare Books Room.  The room is dark and lawyerly with a green marble table, lots of stained wood, and of course old books." height="270" width="720"></p>
<!-- <img src="http://www.stmarytx.godort.com/omeka/themes/defaultmakingbluetableslayout/images/rarebooksroom.jpg"  alt="A photograph of the Sarita Kenedy East Law Library Rare Books Room.  The room is dark and lawyerly with a green marble table, lots of stained wood, and of course old books."/> -->
</div>
<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <div id="featured-item">
        <?php echo display_random_featured_item(); ?>
    </div><!--end featured-item-->	
    <?php endif; ?>

    <!-- Recent Items -->		
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php 
        $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
        set_items_for_loop(recent_items($homepageRecentItems));
        if (has_items_for_loop()): 
        ?>
        <ul class="items-list">
        <?php while (loop_items()): ?>
        <li class="item">
            <h3><?php echo link_to_item(); ?></h3>
            <?php if($itemDescription = item('Dublin Core', 'Description', array('snippet'=>150))): ?>
                <p class="item-description"><?php echo $itemDescription; ?></p>
            <?php endif; ?>						
        </li>
        <?php endwhile; ?>
        </ul>
        <?php else: ?>
        <p><?php echo __('No recent items available.'); ?></p>
        <?php endif; ?>
        <p class="view-items-link"><?php echo link_to_browse_items(__('View All Items')); ?></p>
    </div><!-- end recent-items -->
</div><!-- end primary -->
<div id="secondary">
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        <?php echo display_random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>	
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>
</div><!-- end secondary -->
<?php foot(); ?>