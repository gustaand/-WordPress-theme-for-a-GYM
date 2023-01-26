<?php 
  
  /* Consultas Reutilizables */
  require get_template_directory() . '/inc/queries.php';

  //cuando el tema es activado
  function gymproject_setup() {

    // habilitar imagenes destacadas
    add_theme_support('post-thumbnails');   
    // sirve para poner el panel de agregar imagenes destacadas
    // al igual que the_title() y the_content(), tienes que decirle que quieres mostrar la imagen y donde.


    // Titulos SEO
    add_theme_support( 'title-tag'); //genera los titulos de la página

    // Agregar imagenes de tamaño personalizado
    // add_image_size( 'nombre_que_quieras', 'width', 'height', 'si la cora o no (boolean)')
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 175, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
    //Para no subir imagenes de nuevo para agregar el tamaño, utiliar un plugin "regenerate thumbnails"
  }
  add_action('after_setup_theme', 'gymproject_setup');    //cuando el tema es activado


  // menus de navegación, agregar más utilizando el array.
  function gymproject_menus() {
    // la primera parte es lo que wordpress entiende, la segunda es lo que el usuario ve.
    // el __( 'Lo que vê el usuario', 'text domain que definimos en style.css' ) "__" es la forma de traducir.
    register_nav_menus(array(
      'menu-principal' => __( 'Menu Principal', 'gymproject' )  
    ));
  }
  
  add_action('init', 'gymproject_menus');
  //add_action('hook', 'function') quiere decir que vamos a utilizar un hook.
  //init: La funcion va correr mientras visite el sitio web, esto quiere decir que la función
  //va correr cuando WordPress se inicie.
  

  //scripts & styles

  function gymproject_scripts_styles() {

    // wp_enqueue_style('nombre del archivo', ruta, array('dependencias'), version, $media);

    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    wp_enqueue_style('slickNavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

    wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');
    
    if (is_page('galeria')):
      wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');
    endif;

    if (is_page('inicio')):
      wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;

    // La hoja de estilo principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFonts'), '1.0.0'); 
    //para que funcione, tiene que poner la función php wp_head(); en el <head></head> de la app. 

    wp_enqueue_script('slickNavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);

    if (is_page('inicio')):
      wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12');
    endif;

  }

  add_action('wp_enqueue_scripts', 'gymproject_scripts_styles');
  //wp_enqueue_scripts: quiere decir que va cargar el estilo en el frontend.


// Definir Zona de Widgets.

function gymproject_widgets() {
  register_sidebar(array(
    'name' => 'Sidebar 1', 
    'id' => 'sidebar_1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name' => 'Sidebar 2', 
    'id' => 'sidebar_2',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '</h3>',
  ));
  //register_sidebar: Función de wordpress para definir una zona de widgets.
}

add_action('widgets_init', 'gymproject_widgets'); 
//widgets_init: hook para habilitar la zona de widgets.

/* IMAGEN HERO */

function gymproject_hero_image() {
  // obtener ID pagina principal
  $front_page_id = get_option('page_on_front');
  // obtener id imagen
  $id_imagen = get_field('imagen_hero', $front_page_id);
  // obtener imagen
  $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];


  // Style CSS
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  $imagen_destacada_CSS = "
    body.home .site-header {
      background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ) , url($imagen) ;
    }
  ";

  wp_add_inline_style('custom', $imagen_destacada_CSS);
}

add_action( 'init', 'gymproject_hero_image');