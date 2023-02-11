<?php get_header(); ?>
<?php 
// Template Name: Contact
get_header(); 
?>

<section class="page-post container">
  <?php
    $thumb_id = get_post_thumbnail_id(get_the_id());
    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
  ?>
  <div class="post-img"><img src="<?php echo $thumb_url[0]; ?>"> </div>
  <h1> <?php the_title(); ?> </h1>
  <?php 
    foreach(get_the_category(get_the_id()) as $category){
      echo "<a href=\"".get_category_link($category->term_id)."\">{$category->name}</a> | ";
      echo category_description($category);
    }
  ?>
  <p> <?php echo get_the_date(); ?> </p>
  <p> <?php the_content(); ?> </p>
  <a href="<?php the_field('link_projeto') ?>" target="_blank">Ver projeto</a>
</section>

<?php get_footer(); ?>
<?php get_footer(); ?>

