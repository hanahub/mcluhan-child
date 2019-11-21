<?php

/* Template Name: Blank Page */

/* We only need the page template specific body_class for styling – other than that, the page template is exactly the same as all other singulars. Because of this, we can just include the singular template here. */

?>

<html class="no-js blank-page-template" <?php language_attributes(); ?>>

	<head>

		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<meta name="google-site-verification" content="hLt8THCo4fgvg02kXwrHSsZFberjeIKKZ8ubZxzGfqI" />

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-135054420-1', 'auto');
      ga('send', 'pageview');
    </script>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
    <main class="site-content">
      <div class="entry-content">

				<?php the_content(); ?>

      </div>
    </main>
  
    <?php wp_footer(); ?>
  </body>

</html>