<?php while( have_posts()): the_post(); ?>
  <h1 class="text-center texto-primario"><?php the_title(); ?></h1>

  <?php 
    if (has_post_thumbnail()):
      the_post_thumbnail( 'blog', array('class' => 'imagen-destacada'));
      // image default sizes: 'thumbnail' (150px), 'medium' (max 300px W & H), 
      // 'large' (max 1024px W & H), 'full' (Original size)
    endif;
  ?>

  <?php //revisar si el custom post type es clases

    if (get_post_type() === 'clases') {
      $hora_inicio = get_field('hora_inicio');
      $hora_fin = get_field('hora_fin'); ?>

      <p class="informacion-clase"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?></p>
    
    <?php } ?>

  <?php the_content(); ?>

<?php endwhile; ?>