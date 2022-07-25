<?php
$comment_count = 0 ;
$Comments = get_comments(); // get all comment
$catTitles = single_cat_title(); // category name
$category = get_queried_object();  // object(category)
//   print_r($category);
$post_count = $category->count ;

foreach($Comments as $comment){  // loop all comment
    $post_id = $comment->comment_post_ID ; //get post id which comment in
   
    if(in_category("$category->name" , $post_id)){
      $comment_count ++ ;
        }else{
            continue ;
        } 
    }
?>
<div class="side-div">
    <div class="sidebar-h"><h6><?php echo $category->name ." "."Statistcs";?></h6></div>
    <div class="row sidebar1">
      <span> Comments : <?php echo $comment_count ;?></span>
      <span> posts : <?php echo $post_count ;?></span>
    </div>
</div>

<?php

$post_arg = array(
    'posts_per_page' => 5 ,
    'cat'           =>$category->cat_ID
);
$query =new WP_Query($post_arg);
if($query->have_posts()){
  ?>
  <div class="side-div">
    <div class="sidebar-h"><h6><?php echo $category->name ." "."Posts";?></h6></div>
    <div class="sidebar1">
          <ul>
      <?php
      while($query->have_posts()){
            $query->the_post();
      ?>
   
           <li><a href="<?php the_permalink()?>" ><?php the_title(); ?></a></li>
         
       
   <?php
    }
    }
   ?>
     </ul>
    </div>
   </div>
   
   <?php

$hotPost_arg = array(
    'posts_per_page' => 1,
    'orederby'       =>'comment_count'
);
$query =new WP_Query($hotPost_arg);

if($query->have_posts()){
    ?>
  <div class="side-div">
     <div class="sidebar-h"><h6><?php echo "high Post" ;?></h6></div>
     <?php
     while($query->have_posts()){
           $query->the_post();
     ?>
        
     <div class="sidebar1">
      <ul>
       <a href="<?php the_permalink()?>" ><?php the_title(); ?></a>
      </ul>
     </div>
   </div>
       
<?php

// comments_popup_link('0 comment' , '1 comment' ,'% comments' , 'comment-style') ;
    }

}


