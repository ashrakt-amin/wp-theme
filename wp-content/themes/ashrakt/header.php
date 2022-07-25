<!DOCTYPE html>
 <html <?php language_attributes() ?> >
  <head>
   <meta charset="<?php bloginfo('charset')?>" />
   <title><?php wp_title('|',"true",'right'). bloginfo('name')?></title>
   <link rel="pingback" href="<?php bloginfo('pingback_url')?>" />
   <link rel="stylsheet" href=" <?php echo get_template_directory().'/css/main.css'?>"/> 

   <script src="https://kit.fontawesome.com/31bef944f5.js" crossorigin="anonymous"></script>

   <?php wp_head(); ?>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
    <div class="collapse navbar-collapse auto-right" id="navbarSupportedContent">
      <?php bootstrap_menu(); ?>

    </div>
  </div>


</nav>
  
