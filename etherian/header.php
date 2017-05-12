<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">

    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/etherian-og.png" />

		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|PT+Serif:400,700' rel='stylesheet' type='text/css'>

		<?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-98631819-1', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
	<body>
    <!-- Preloader -->

    <div id="preloader">
      <div class="cssload-thecube">
        <div class="cssload-cube cssload-c1"></div>
        <div class="cssload-cube cssload-c2"></div>
        <div class="cssload-cube cssload-c4"></div>
        <div class="cssload-cube cssload-c3"></div>
      </div>
    </div>

    <div class="search-bar">
      <i class="fa fa-search"></i>&nbsp;
      <input type="text" name="s" placeholder="Search for a Ðapp..." />

      <?php if (is_page('home')) { ?>
        <div class="sort-cover">
          SORT&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
        </div>
        <select name="sort" id="sortDapps">
          <option value="" disabled selected>SORT</option>
          <option value="name" data-asc="true">A - Z</option>
          <option value="name" data-asc="false">Z - A</option>
          <option value="date" data-asc="true">Most Recent</option>
          <option value="date" data-asc="false">Least Recent</option>
        </select>
      <?php } // endif ?>
    </div>

    <nav id="mobileNavMenu" class="nav-bar-mobile">
      <ul id="navMenu" class="nav-menu">
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li><a href="<?php echo home_url('/posts'); ?>">Posts</a></li>
        <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
        <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
      </ul>

      <div class="nav-footer">
        © the etherian <script>document.write(new Date().getFullYear())</script>
      </div>
    </nav>

    <div class="container-fluid container-body" id="content">
      <div class="row">
        <nav class="col-sm-2 nav-bar">
          <ul id="navMenu" class="nav-menu">
            <li>
              <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="The Etherian Logo"></a>
              <a href="#" id="openMenu" class="open-nav-menu"><i class="fa fa-bars"></i></a>
              <a href="#" id="openSearch" class="open-search-menu"><i class="fa fa-search"></i></a>
            </li>
            <li <?php is_front_page() ? print 'class="current"' : print ''; ?>><a href="<?php echo home_url(); ?>">Home</a></li>
            <li <?php is_home() ? print 'class="current"' : print ''; ?>><a href="<?php echo home_url('/posts'); ?>">Posts</a></li>
            <li <?php is_page('about') ? print 'class="current"' : print ''; ?>><a href="<?php echo home_url('/about'); ?>">About</a></li>
            <li <?php is_page('contact') ? print 'class="current"' : print ''; ?>><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
          </ul>

          <div class="nav-footer">
            © the etherian <script>document.write(new Date().getFullYear())</script>
          </div>
        </nav>
      </div>
