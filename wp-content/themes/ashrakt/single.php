<?php 
get_header();
include(get_template_directory()."/includes/breadcrumb.php");
 ?>

<div calss="container single-home d-flex justify-content-center">

<?php 
if(have_posts()){
  while(have_posts()){
    the_post(); 
    ?>
    <div class="card ">
      <div class="card-body">
        <?php edit_post_link('<i class="fa fa-pencil"></i>'); ?>
        <a href="<?php the_permalink() ?>"><h3 class="post-title"> <?php the_title(); ?></h3></a>
          <div class="single-post d-flex justify-content-center">
            <span class="post-author"><i class="fa-solid fa-user"></i><?php the_author_posts_link() ?></span>
            <span class="post-date"><i class="fa-solid fa-calendar"></i><?php the_time(); ?> 22/5/2022 </span>
            <span class="post-comments"><i class="fa-solid fa-comment"></i><?php comments_popup_link('0 comment' , '1 comment' ,'% comments' ,'comment disable' , 'comment-style') ?></span>
          </div>
          <div class="row d-flex justify-content-center">
           <div class="col-sm-4">
            <?php the_post_thumbnail('', ['class' => 'img-responsive responsive--full img-thumbnail','title'=>'post image']) ?>
           </div>  
          <div class="col-sm-4">
            <p class="post-content">
              <?php the_content(); ?>
            </p>
          </div>  
         </div>
        
         <hr>
         <p class="categories"><i class="fa-solid fa-tags"></i><?php the_category( ' ' ); ?></p>
         <p class="tags"><?php if(has_tag()){ the_tags();
                                }else{
                                echo "0 tags";
                                }
                         ?>
         </p>
        </div>

        <?php 
echo'<div class="pagination single"> ';
if(get_previous_post_link()){
    previous_post_link('%link', '%title');
 }else{
 
   echo "" ;
  
 }

 if(get_next_post_link()){
    next_post_link('%link', '%title');
 }else{
 

    echo "" ;
 
 }
 echo"</div>";
 ?>
       </div>
      

 <?php
 
  }   //end while loop 
} //end if 
    
            // we have 2 ways to Retrieves the ID of the currently queried object. (post).
            // one
           
            // global $post;
            //echo $post->ID ;
            //two
           // echo get_queried_object_id();

            //wp_get_post_categories( int $post_id, array $args = array())
            //Retrieve the list of categories for a post.
            //print_r(wp_get_post_categories(get_queried_object_id()));


 ?>



<div calss="container d-flex justify-content-center" style="padding:20px">
<div class="posts" style=" background-color:#fff">


                                <!--start posts loop -->
                                                                 <?php 
        $random_posts_arg = array(
          'orderby'       => 'rand',
          'posts_per_page'=> -1,
          'category__in'  => wp_get_post_categories(get_queried_object_id()),
          'post__not_in'  =>array(get_queried_object_id()),
        );


         $random_posts = new WP_Query($random_posts_arg);
        if($random_posts ->have_posts()){ 

          while($random_posts -> have_posts()){
            $random_posts ->the_post(); 
        ?>
           <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
           <hr>
       
    <?php

      }   //end while loop 
      } //end if 

      wp_reset_postdata(); //reset loop query
       
    ?> 
</div>
</div>

 <div class="author">
    <div class="row">
     <div class="col-md-3">
      <?php  
       $avatar_arguments =array(
        'class'=>'img-thumbnail img-responsive center-block ',
        );
        echo get_avatar(get_the_author_meta('ID'),150,'','user avatar',$avatar_arguments); ?>
      </div>
        
     <div class="col-md-8">   
     <h4>
         <?php the_author_meta('first_name'); ?>
         <?php the_author_meta('last_name'); ?>
         (<?php the_author_meta('nickname'); ?>)
      </h4>

       <?php if(get_the_author_meta('description')){ ?>
       <p><?php the_author_meta('description'); ?></p>
       <?php  
             }else{
        echo 'there is no biograghy';
       }
        ?>
        
     </div>
     <hr>
     
     <div class="author-stats">
        <p><i class="fa-solid fa-house-chimney"></i> user profile link  : <span class="profile-link"><?php the_author_posts_link()?></span></p>
        <p><i class="fa-solid fa-tag"></i> user posts count : <span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')) ;?></span></p>
      </div>
    </div>
   </div>
   

 <?php
 echo'<div class="comment"> ';
 comments_template();
 echo'</div>';

?>



</div>


<?php  get_footer(); ?>
   </div>
   </div>