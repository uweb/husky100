<?php
/*
  Template helper functions
*/

add_action( 'extend_uw_object', function($UW) {
  require( 'setup/uw.category-checklist.php' );
});

//$UW->Category_Checklist::init();



?>
