
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
        <meta name="description" content="<?php bloginfo('description', 'display'); ?>">
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>

        <!--[if lt IE 9]>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/html5shiv.js" type="text/javascript"></script>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/respond.js" type="text/javascript"></script>
            <link rel='stylesheet' href='<?php bloginfo("template_directory"); ?>/assets/ie/css/ie.css' type='text/css' media='all' />
        <![endif]--> 
        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>

    </head>
    <body <?php body_class(); ?> id="husky100">

    <a href="#main_content" class="screen-reader-shortcut">Skip to main content</a>

    <div id="thin-strip">
        <a class="wordmark" href="http://uw.edu" tabindex="-1" title="University of Washington Home">Home</a>
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/UofWA" title="Facebook">Facebook</a></li>
            <li class="twitter"><a href="https://twitter.com/uw" title="Twitter">Twitter</a></li>
            <li class="instagram"><a href="http://instagram.com/uofwa" title="Instagram">Instagram</a></li>
            <li class="youtube"><a href="http://www.youtube.com/uwhuskies" title="YouTube">YouTube</a></li>
            <li><a href="http://uw.edu/students" class="slash" title="Students">Students</a></li>
            <li><a href="http://uw.edu/parents" class="slash" title="Parents">Parents</a></li>
            <li><a href="http://uw.edu/facultystaff" class="slash" title="Faculty &amp; Staff">Faculty &amp; Staff</a></li>
            <li><a href="http://uw.edu/alumni" class="slash" title="Alumi">Alumni</a></li>
        </ul>
    </div>
 

    <div class="module-hero-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')">
      <div class="container">     
        <div class="row">
          <h1><?php the_title(); ?></h1>
          <div class="udub-slant"><span></span></div>
          <p>The Husky 100 recognizes 100 UW undergraduate and graduate students from Bothell, Seattle and Tacoma in all areas of study who are making the most of their time at the UW.</p>
          <div class="boundless-button sm"><span><a href="#">Apply</a></span></div>
          <div class="boundless-button sm second"><span><a href="#">Learn more</a></span></div>
        </div>
      </div>
    </div>

</body>
</html>
