<?php get_header(); ?>

  <main class="contenedor pagina seccion no-sidebar">

    <div class="text-center">
      <?php get_template_part('template-parts/paginas'); ?>

      <?php gymproject_lista_clases(); ?>
    </div>


    <!-- <?php get_sidebar(); ?> -->
  </main>

<?php get_footer(); ?>