<?php get_header(); ?>
<?php 
// Template Name: Contact
get_header(); 
?>

<section id="listagemProjetos" class="container">
    <h2>Conheça nossos projetos</h2>
    <ul class="listagem_projetos">
      <?php
        function limitChars($text, $limit=20) {
          $join = array();
          $ArrayString = explode(" ", $text);
          
          if ($limit > count($ArrayString)) {
            $limit = count($ArrayString) / 2;   
          }
        
          foreach ($ArrayString as $key => $word) {
            $join[] = $word;
            if ($key == $limit) {
              break;
            }
          }
          //print_r($join);
          return implode(" ", $join)."...";
        }

        $args = array(
          'numberposts'	=> 0,
        );
        
        $my_posts = get_posts($args);
        
        if( !empty( $my_posts ) ) :
          foreach ( $my_posts as $p ): ?>
            <?php
              $thumb_id = get_post_thumbnail_id($p->ID);
              $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
            ?>
            <li class="listagem_projetos-project">
              <article>
                <div class="section-top">
                  <a class="listagem_projetos-header" href="<?php echo get_permalink( $p->ID ); ?>"><img src="<?php echo $thumb_url[0]; ?>" alt="imagem-padrão"></a>
                  <div class="listagem_projetos-body">
                    <h4 class="listagem-body--title"><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo ($p->post_title ); ?></a></h4>
                    <span  class="listagem-body--category">
                    <?php 
                      foreach(get_the_category($p->ID) as $category){
                        echo "<a href=\"".get_category_link($category->term_id)."\">{$category->name}</a> | ";
                        echo category_description($category);
                      }
                    ?>
                    </span>
                    <p class="listagem-body--description"><?php echo( limitChars($p->post_content) ) ?></p>
                  </div>
                </div>
                <div class="listagem_projetos-footer ">
                  <a href="<?php echo get_permalink( $p->ID ); ?>">Ver projeto</a>
                </div>
              </article>
            </li>
          <?php endforeach; 
        endif; ?>
    </ul>
  </section>


<?php get_footer(); ?>
<?php get_footer(); ?>

