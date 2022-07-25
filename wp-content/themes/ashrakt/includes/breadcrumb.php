<?php 
$all_cats = get_the_category(); //Retrieves  post categories.
// print_r($all_cats);

?>

<div class="breadcrumbs-holder d-flex justify-content-center">
    <div class="">
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo get_home_url();?>">
                 <?php  echo get_bloginfo('name'); ?>
                </a>
            </li>
            <li>/</li>
            <li>
                <a href="<?php echo esc_url(get_category_link($all_cats[0]->term_id));?>">
                <?php echo esc_html($all_cats[0]->name);?>
                </a>
            </li>
            <li>/</li>
             <li class="active"><a href=""><?php echo get_the_title();?></a></li>
        </ol>
    </div>
</div>
<?php 
