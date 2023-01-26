<!-- para crear otra página, hay que asignar su nombre en el php -->

<?php get_header();
/* 
* Template Name: Contenido Centrado (No Sidebars)
*/

?>

  <main class="contenedor pagina seccion no-sidebar">

    <div class="contenido-principal">
      <?php get_template_part('template-parts/paginas'); ?>
    </div>

  </main>

<?php get_footer(); ?>