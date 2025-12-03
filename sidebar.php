<?php
/**
 * Sidebar Principal
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<div class="glass" style="padding: 25px; position: sticky; top: 100px;">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>