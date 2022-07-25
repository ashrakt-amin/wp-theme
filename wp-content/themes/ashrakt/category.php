<?php get_header(); ?>
<div calss="container">

  <div class="row d-flex justify-content-center category-information ">


     <div class="col-md-4">
      <h1 class="category-title"><?php single_cat_title(); ?></h1>  
     </div>

     <div class="col-md-4 category-description">
      <p><?php echo category_description(); ?></p>
     </div>

     <div class="col-md-4">
        <span>Articles Articles Articles </span>
     </div>
   

 </div>

  <!--  end category-information -->
  <div class="row d-flex justify-content-center">

<?php 
if(have_posts()){
  while(have_posts()){
    the_post(); 
    ?>
    <div class="col-md-4 main-post ">
    <div class="card">
      <div class="card-body">
        <a href="<?php the_permalink() ?>">
        <h3 class="post-title">
    <?php
   the_title();
   ?>
   </h3>
   </a>
   <span class="post-author"><i class="fa-solid fa-user"></i><?php the_author_posts_link() ?></span>
      <span class="post-date"><i class="fa-solid fa-calendar"></i><?php the_time(); ?> 22/5/2022 </span>
      <span class="post-comments"><i class="fa-solid fa-comment"></i><?php comments_popup_link('0 comment' , '1 comment' ,'% comments' ,'comment disable' , 'comment-style') ?></span>
      <div class="d-flex justify-content-center">
              <?php the_post_thumbnail('medium', ['class' => 'img-responsive responsive--full img-thumbnail','title'=>'post image']) ?>
        </div>     
         <p class="post-content">
          <?php the_excerpt(); ?>
          <!-- <a href="<?php echo get_permalink(); ?>">more... </a> -->
        </p>
         <hr>
         <p class="categories"><i class="fa-solid fa-tags"></i><?php the_category( ' ' ); ?></p>
         <p class="tags">
          <?php if(has_tag()){
                     the_tags();
                 }else{
                  echo "0 tags";
                 }

                 ?>
                 </p>

     

   </div>
   </div>

 </div>

 <?php
 
  }   //end while loop 
} //end if 


?>
    <div class="col-md-2 sidebar">
    <?php
     if(is_active_sidebar('main_sidebar')){
        dynamic_sidebar('main_sidebar');
     } 
      get_sidebar('cat')?>
    
    </div>

        </div>

        <div class="post-pagination">
        <?php
          echo pagination_numbring();


// echo'<div class="post-pagination"> ';
// if(get_previous_posts_link()){
//   previous_posts_link('<i class="fa-solid fa-angle-left"></i> prev');
//  }else{
 
//    echo "" ;
  
//  }

//  if(get_next_posts_link()){
//   next_posts_link('next <i class="fa-solid fa-angle-right"></i>');
//  }else{
 
//     echo "" ;
 
//  }
//  echo'</div>';

?>

</div>
</div>



<?php get_footer(); ?>