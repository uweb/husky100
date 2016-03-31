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

      <!-- Tiles specific JS and CSS -->
      <script src="<?php plugins_url('js/tiles.js', __FILE__) ?>"></script>
      <link rel='stylesheet' href='<?php plugins_url('css/tiles.css') ?>' type='text/css' media='all' />


    </head>
    <body <?php body_class(); ?> id="husky100">

    <a href="#main_content" class="screen-reader-shortcut">Skip to main content</a>

    <div id="thin-strip">
        <a class="wordmark" href="http://uw.edu" tabindex="-1" title="University of Washington Home">Home</a>
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/UofWA" title="Facebook">Facebook</a>
            <li class="twitter"><a href="https://twitter.com/uw" title="Twitter">Twitter</a>
            <li class="instagram"><a href="http://instagram.com/uofwa" title="Instagram">Instagram</a>
            <li class="youtube"><a href="http://www.youtube.com/uwhuskies" title="YouTube">YouTube</a>
            <li><a href="http://uw.edu/students" class="slash" title="Students">Students</a>
            <li><a href="http://uw.edu/parents" class="slash" title="Parents">Parents</a>
            <li><a href="http://uw.edu/facultystaff" class="slash" title="Faculty &amp; Staff">Faculty &amp; Staff</a>
            <li><a href="http://uw.edu/alumni" class="slash" title="Alumi">Alumni</a>
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
    
    <ul id="filter">
      <li>
        <button autofocus>Show all <div class="udub-slant"><span></span></div></button>        
      </li>
      <li>
        <button data-filter=".junior">Juniors <div class="udub-slant"><span></span></div></button>        
      </li>
      <li>
        <button data-filter=".senior">Seniors <div class="udub-slant"><span></span></div></button>     
      </li>
      <li>
        <button data-filter=".graduate">Graduate <div class="udub-slant"><span></span></div></button>        
      </li>
      <li>
        <button>Location <div class="udub-slant"><span></span></div></button>       
      </li>
      <li class="search_slash">
        <button>Major <div class="udub-slant"><span></span></div></button>        
      </li>
      <li>
        <a title="Search button" id="searcher" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26.396" height="55.35" viewBox="0 0 26.396 55.35" aria-hidden="true"><path fill="#4B2E83" d="M2.146 20.753l5.372-5.365c1.378.973 3.054 1.55 4.866 1.55h.002c4.672 0 8.473-3.8 8.473-8.47C20.857 3.798 17.057 0 12.385 0c-4.67 0-8.47 3.8-8.47 8.468 0 1.763.543 3.4 1.468 4.758L0 18.603l2.146 2.15zm10.24-17.917c3.11 0 5.64 2.526 5.64 5.632 0 3.107-2.53 5.635-5.64 5.635-3.106 0-5.634-2.528-5.634-5.635 0-3.104 2.527-5.63 5.634-5.632zm6.22 32.162c0-.414-.162-.804-.455-1.095-.585-.59-1.605-.59-2.193 0l-5.588 5.583-5.585-5.584c-.588-.588-1.612-.587-2.195 0-.294.292-.456.682-.456 1.096s.162.804.455 1.098l5.585 5.586-5.587 5.586c-.294.295-.456.687-.455 1.102 0 .413.163.8.45 1.087.58.593 1.614.597 2.2.004l5.585-5.584 5.584 5.582c.29.297.683.46 1.1.46s.81-.163 1.097-.455c.292-.292.454-.68.455-1.093.002-.415-.16-.807-.455-1.102l-5.586-5.586 5.587-5.586c.294-.294.455-.684.455-1.098z"/></svg></a>        
      </li>
    </ul>

    <div id="searcher_wrap">
      <input type="text" class="quicksearch" placeholder="Start typing" />
    </div>
  

    <!-- Add this to  ontouchstart="this.classList.toggle('hover');" -->


    <div id="main-content">
         
         <div class="grid">

         <div class="grid-sizer"></div>

         <div class="grid-item special title-card">
           <h2>Seniors</h2>
           <div class="udub-slant"><span></span></div>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque lacus a nisl imperdiet, vel convallis erat elementum. </p>
         </div>

           <div data-name="ed" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/1-high.jpg' )?>" class="flip-container grid-item senior">
             <div class="flipper">
               <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/1.jpg' ) . ')'?>">
               </div>
               <div class="back">
                 <h3>Amber Swayze</h3>
                 <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
               </div>
               <div class="full-bio">
                 <h2>Amber Swayze</h2>
                 <div class="bio-info">
                   <p>Burlington, WA</p>
                   <p>Communication</p>
                   <p>Spring, '16</p>
                 </div>
                 <div class="bio-text">
                   <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                   <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                   <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                 </div>
                 <div class="tags">
                   <a href="#">Community Organizing/Outreach</a>
                   <a href="#">Media</a>
                   <a href="#">Education - Higher Education</a>
                   <a href="#">Journalism</a>
                   <a href="#">News</a>
                 </div>
               </div>
             </div>
           </div>

           


          <div data-name="sue" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/2-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/2.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Jenny Ames</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Athletics</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="tim" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/3-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/3.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="lara-ignacio" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/4-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/4.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Bill Stein</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="sue-wright" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/5-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/5.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="jim-tressel" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/6-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/6.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Athletics</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="sandra-oh" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/7-high.jpg' )?>" class="flip-container grid-item featured">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/7.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="tim-conway" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/8-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/8.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="ed-sheeran" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/9-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/9.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="jake-fletcher" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/10-high.jpg' )?>" class="flip-container grid-item senior featured">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/10.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="dana-faro" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/12-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/12.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="jill-stratego" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/13-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/13.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="Maecenas-orita" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/14-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/14.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Athletics</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="faucibus-light" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/15-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/15.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="dubs-real" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/2-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/2.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/3-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/3.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/4-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/4.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div class="grid-item special infographic">
            <h2>Did you know?</h2>
            <img src="<?php echo plugins_url( 'template-hierarchy/assets/husky100/ribbon.png' )?>">
            <p></p>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/5-high.jpg' )?>" class="flip-container grid-item featured">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/5.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/6-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/6.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/7-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/7.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/8-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/8.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/9-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/9.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/10-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/10.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/12-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/12.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/13-high.jpg' )?>" class="flip-container grid-item featured junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/13.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/14-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/14.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/15-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/15.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/2-high.jpg' )?>" class="flip-container grid-item graduate featured">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/2.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/3-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/3.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/4-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/4.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/5-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/5.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/6-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/6.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/7-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/7.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/8-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/8.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/9-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/9.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/10-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/10.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/12-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/12.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/13-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/13.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/14-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/14.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/15-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/15.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/2-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/2.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/3-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/3.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/4-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/4.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/5-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/5.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/6-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/6.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/7-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/7.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/8-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/8.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/9-high.jpg' )?>" class="flip-container grid-item">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/9.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/10-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/10.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/12-high.jpg' )?>" class="flip-container grid-item graduate">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/12.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>

          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/13-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/13.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/14-high.jpg' )?>" class="flip-container grid-item senior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/14.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>


          <div data-name="" data-img="<?php echo plugins_url( 'template-hierarchy/assets/husky100/15-high.jpg' )?>" class="flip-container grid-item junior">
            <div class="flipper">
              <div class="front" style="<?php echo 'background-image:url(' . plugins_url( 'template-hierarchy/assets/husky100/15.jpg' ) . ')'?> ">
              </div>
              <div class="back">
                <h3>Amber Swayze</h3>
                <p>Maecenas faucibus mollis interdum. Aenean eu leo quam.</p>
              </div>
              <div class="full-bio">
                <h2>Amber Swayze</h2>
                <div class="bio-info">
                  <p>Burlington, WA</p>
                  <p>Communication</p>
                  <p>Spring, '16</p>
                </div>
                <div class="bio-text">
                  <p>Dubs I, was named the University of Washington's 13th live mascot in February of 2009. He is an Alaskan Malamute from a kennel in Burlington, Washington. He was born in November of 2008 and is living with his family in Seattle.</p>

                  <p>In late September 2008, the school announced an initiative to search for an appropriate name for its live mascot that would remain an ongoing UW tradition. A contest was launched on GoHuskies.com and fans were asked to submit their favorite name for the live Husky dog.</p>

                  <p>More than 1,400 different nominations were received and a committee that consisted of campus and community representatives narrowed the field to a reasonable list of finalists, including: Admiral, Dubs, King, Koda, Legend, Reign, Spirit and Sundodger. More than 20,000 votes were received in two rounds of online voting via GoHuskies.com, with Dubs emerging victorious.</p>
                </div>
                <div class="tags">
                  <a href="#">Community Organizing/Outreach</a>
                  <a href="#">Media</a>
                  <a href="#">Education - Higher Education</a>
                  <a href="#">Journalism</a>
                  <a href="#">News</a>
                  <a href="#">Public Relations</a>
                </div>
              </div>
            </div>
          </div>
  

         </div>   

    </div>
    









</body>
</html>
