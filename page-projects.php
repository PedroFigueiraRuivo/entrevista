<?php 
// Template Name: Projects
get_header(); 
?>

  <section id="listagemProjetos" class="container">
    <h2>Conheça nossos projetos</h2>
    <div class="projects_box">
      <ul class="listagem_filter">
        <li>
          <input type="radio" id="all">
          <label for="all" title="Todas as categorias" value="all">Todas as categorias</label>
        </li>
        <?php
          $terms = get_terms(array(
            'taxonomy' =>'category'
          ));

          foreach($terms as $term) : ?>
            <li>
              <input type="radio" id="<?php echo $term->slug; ?>">
              <label for="<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>" value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
            </li>
          
          <?php endforeach; ?>
      </ul>
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

        $taxonomyName;
        if (isset($_GET['keyCat'])) {
          $idObj = get_category_by_slug($_GET['keyCat']); 
          $taxonomyName = $idObj->term_id;
        } else {
          $taxonomyName = 0;
        }

        $args = array(
          'numberposts'	=> 0,
          'category' => $taxonomyName
        );
        
        $my_posts = get_posts($args);
        
        if( !empty( $my_posts ) ) :
          foreach ( $my_posts as $p ): ?>
            <?php
              $thumb_id = get_post_thumbnail_id($p->ID);
              $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
            ?>
            <li class="listagem_projetos-project">
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
            </li>
          <?php endforeach; 
        endif; ?>
      </ul>
    </div>
  </section>

  <script type="module" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scripts.js"></script>
<?php get_footer(); ?>