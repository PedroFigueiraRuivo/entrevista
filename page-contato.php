<?php 
// Template Name: Contact
get_header(); 
?>

<section id="contato" class="container">
  <h2>Entre em contato conosco</h2>
  <?php echo do_shortcode( '[contact-form-7 id="28" title="Formulário de contato 1"]' ); ?>
</section>

<?php get_footer(); ?>