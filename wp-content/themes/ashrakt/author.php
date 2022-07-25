<?php get_header(); ?>

<div class="container author-page">
 <h1 class="text-center profile-header"><?php echo get_the_author_meta('first_name')." ".get_the_author_meta('last_name') ?></h1>
  <div class="author-main-info">
    <!-- start row 1 -->
    <div class="row">
        <div class="col-md-3">
            <?php 
            $arg=array(
             'class' =>'img-thumbnail img-responsive center-block'
            );
            echo get_avatar(get_the_author_meta('ID'),200,'','user avatar',$arg )
            ?>
        </div>
        <div class="col-md-9">
            <ul class="list-unstyled">
                <li><span>first name : </span><?php echo get_the_author_meta('first_name')?></li>
                <li><span>last name : </span><?php echo get_the_author_meta('last_name')?></li>
                <li><span>nick name : </span><?php echo get_the_author_meta('nickname')?></li>
            </ul>
            <hr>
            <?php if(get_the_author_meta('description')){?>
               <p><?php the_author_meta('description')?></p>
                  <?php }else{
                    echo 'there is no biograghy';
                  } ?>
        </div>
    </div>
    <!-- end row 1 -->
  </div>
  <!-- end main info -->

   

    <div class="author-stats">
         <!-- start row 2 -->
        <div class="row">

           <div class="col-md-3">
            <div class="stats">
                posts count
                <span><?php echo count_user_posts(get_the_author_meta('ID'));?></span>
            </div>
           </div>

           <div class="col-md-3">
            <div class="stats">
                comments count
                <span>
                    <?php
                $commentsCountArguments=array(
                    'count'   =>true ,
                    'user_id' => get_the_author_meta('ID')
                );
                echo get_comments($commentsCountArguments);
                     ?>
                </span>
            </div>
           </div>

           <div class="col-md-3">
            <div class="stats">
                posts view
                <span>0</span>
            </div>
           </div>

           <div class="col-md-3">
            <div class="stats">
                testing
                <span>0</span>
            </div>
           </div>

        </div>
        <!-- end row 2 -->
    </div>

   
                                                                 <!--start posts loop -->
        <?php 
        $author_posts_arg = array(
          'author'  => get_the_author_meta('ID'),
          'posts_per_page'=> 5
        );
         $author_posts = new WP_Query($author_posts_arg);
        if($author_posts ->have_posts()){ 
            ?>

            <h3 class="author-posts-name"> <?php echo get_the_author_meta('nickname')." "."posts";?></h3>
            <?php 
          while($author_posts -> have_posts()){
            $author_posts ->the_post(); 
           
            
        ?>
        <div class="author-posts">
            <div class="row">

        <div class="col-md-5">
        
              <?php the_post_thumbnail('medium', ['class' => 'img-responsive responsive--full ','title'=>'post image']) ?>
               
        </div>

        <div class="col-md-7">
           <a href="<?php the_permalink() ?>"><h3 class="post-title"><?php the_title(); ?></h3></a>
           <p class="post-content"><?php the_excerpt(); ?></p>
           <div class="d-flex justify-content-center">
              <span class="post-date"><i class="fa-solid fa-calendar"></i><?php the_time('F j,y'); ?></span>
              <span class="post-comments"><i class="fa-solid fa-comment"></i><?php comments_popup_link('0 comment' , '1 comment' ,'% comments' ,'comment disable' , 'comment-style') ?></span>
           </div>
        </div>

        </div>
         </div>
    <?php

      }   //end while loop 
      } //end if 

      wp_reset_postdata(); //reset loop query
       
     


      //comments

      ?>
      <h3 class="author-posts-name"> comments</h3>
      <?php
      $comments_arg = array(
         'user_id'      => get_the_author_meta('ID'),
         'post_status'  => 'publish' ,
         'post_type'    => 'post' ,
         'status'       => 'approve' ,
         'number'       => 5
      );

      $comments = get_comments($comments_arg);
      foreach($comments as $comment){
        ?>
        <div class="author-comments">
            <h4>
             <a href="<?php echo get_permalink($comment->comment_post_ID)?>">
              <?php echo get_the_title($comment->comment_post_ID);?>
             </a>
            </h4>
        
        <br>
            <span class="comment-content"><?php echo $comment->comment_content; ?></span>
        <br>
            <span class="comment-date"><i class="fa-solid fa-calendar"></i><?php echo "Added on".mysql2date("d-m-y" ,$comment->comment_date) ; ?></span>
        <br>
        </div>
         <hr>
         <?php
    }
      ?>

                                                                <!-- end posts loop -->

   <?php
echo'<div class="post-pagination"> ';
if(get_previous_posts_link()){
  previous_posts_link('<i class="fa-solid fa-angle-left"></i> prev');
 }else{
 
   echo "" ;
  
 }

 if(get_next_posts_link()){
  next_posts_link('next <i class="fa-solid fa-angle-right"></i>');
 }else{
 
    echo "" ;
 
 }
 echo'</div>';

?>
 </div>
<!-- end container -->


<?php get_footer(); ?>
