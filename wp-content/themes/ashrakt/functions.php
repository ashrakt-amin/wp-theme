<?php
/*
** functions to add my custom style
wp_enqueue_style()->A safe way to add/enqueue a stylesheet file to the WordPress generated page.

*/
require_once('wp-bootstrap-navwalker.php');
//add featured theme support
add_theme_support( 'post-thumbnails' );
function style(){

   wp_enqueue_style('bootstrap-css',get_template_directory_uri()."/css/bootstrap.min.css" );
   wp_enqueue_style("fontawesome-css", get_template_directory_uri() .'/css/fontawesome.min.css');

   wp_enqueue_style('main',get_template_directory_uri()."/css/main.css" );


}

/*
** functions to add my custom scripts
wp_enqueue_script()->A safe way to add/enqueue a stylesheet file to the WordPress generated page.
true par mean ->to enqueue the script before end of body
*/

/* jquery is a script rigestered in word press*/
/*deregister jq script to use my jq script in the footer */
function script(){
    wp_deregister_script('jquery');//remove registeration for old jq
    wp_register_script('jquery',includes_url("/js/jquery/jquery.js"),false, '',true);// register jq in footer 
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js',get_template_directory_uri()."/js/bootstrap.min.js" ,array('jquery') ,false ,true);
    wp_enqueue_script('fontawesome-js',get_template_directory_uri()."/js/fontawesome.min.js" ,array('jquery') ,false ,true);

    wp_enqueue_script('main-js',get_template_directory_uri()."/js/main.js" ,array() ,false ,true);

 }

 /* add menu feature*/
function custom_menu (){
//    register_nav_menu('menu',__('navigation bar')); 
      register_nav_menus(array(
        'menu' => 'navigation bar' ,
        'footer' => 'footer bar'));
} 

function bootstrap_menu(){
    $defaults= array(
        'theme_location'=> 'menu',
        'menu_class'=>"nav navbar-nav navbar-right ",
        'container'=>false,
        'walker'=>new wp_bootstrap_navwalker()
    );
    wp_nav_menu($defaults);
}
    //start excerpt enhance
function post_length($length){
    if(is_author()){
        return 10;
    }elseif(is_category()){
        return 15;
    }else{
        return 30;
    }
    
}
 add_filter('excerpt_length','post_length');

 function more($more){
    return (" ...");
}
 add_filter('excerpt_more','more');

    //end excerpt enhance



 /* Hook بحط جزء من كزدي فيه واثناء تشغيل البرنامج يشتغل 
 مثلا هوك يشتغل لما اسجل دخول او اعمل كومنت 
 
 if add action doesnt use , this functions dont use
 */

 add_action("wp_enqueue_scripts","style");
 add_action("wp_enqueue_scripts","script");
 add_action("init","custom_menu");




 //pagination numbering

 //$wp_query (object) The global instance of the Class_Reference/WP_Query class.

 function pagination_numbring(){
     global $wp_query ;
     $all_pages = $wp_query->max_num_pages;  // get all posts
     $current_page = max(1,get_query_var('paged'));// get_query_var() =>get number of current page

     if($all_pages > 1){

       $pagination_arg = array(

        'base'    => get_pagenum_link().'%_%' , //Retrieves the link for a page number.
        'format'  => '/page/%#%',
        'current' => $current_page ,
        'mid_size'=> 1 ,
        'end_size'=> 1 ,

       );

      return paginate_links($pagination_arg);
     }
 }


 // register sidebar
 function sidebar(){
   $sidebar_arg =array(
     'name'         => 'Main Sidebar',
     'id'           => 'main_sidebar',
     'description'  =>'main sidebar appear everywhere' ,
     'class'        =>'main-sidebar',
     'before_widget'=>'<div class="widget-content">',
     'after_widget' =>'</div>',
     'before_title' =>'<h3 class="widget-title">',
     'after_title'  =>'</h3>',


   );

   register_sidebar($sidebar_arg );
 }

 add_action('widgets_init','sidebar');
