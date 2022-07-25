<?php 
if(comments_open()){
    echo '<h3>' . comments_number('0 comment' ,'1 comment' ,'%comments').'</h3>';
    echo '<div class="my-comments">';
    echo '<ul class="list-unstyled">';
    $comments_arguments = array(
        'walker'            => null,
        'max_depth'         => 3,
        'style'             => 'ul',
        'callback'          => null,
        'end-callback'      => null,
        'type'              => 'all',
        'page'              => '',
        'per_page'          => '',
        'avatar_size'       => 64,

    );

  wp_list_comments($comments_arguments);
  echo '</ul></div>' ;
  echo '<hr class="comment-separator">';
  $comment_form_arguments = array(
    'title_reply'        => 'add your comment',
    'label_submit'       => 'send',
    'class_submit'       => 'btn btn-primary btn-md mb-3',
    'cancel_reply_link'  =>'cancel',

 

  );
  comment_form($comment_form_arguments );
}else{
   echo 'closed' ;
}


