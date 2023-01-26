<?php 
/*
  Plugin Name: Gym Project - Widget
  Plugin URI: 
  Description: Añade Widgets personalizados al sitio Gym Project
  Version: 1.0.0
  Author: Gustavo Andrew Marques
  Author URI: https://www.gustaand.com
  Text Domain: gymproject
*/ 

if(!defined('ABSPATH')) die(); //prevee a que nadie pueda ver el código abriendo en algun otro sitio.

/**
 * Adds Gymproject_Clases_Widget widget.
 */
class Gymproject_Clases_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'GymProject Clases', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Agrega las Clases como Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		$cantidad = $instance['cantidad'];
		if($cantidad == ''){
			$cantidad = 3;
		}
    ?>
    <ul>
      <?php
        $args1 = array(
          'post_type' => 'clases',
          'posts_per_page' => $cantidad,
          // 'orderby' => 'rand', 
        );
        $clases = new WP_Query($args1);
        while($clases->have_posts()): $clases->the_post();
      ?>

      <li class="clase-sidebar">
        <div class="imagen">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>

        <div class="contenido-clase">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <?php
            $hora_inicio = get_field('hora_inicio');
            $hora_fin = get_field('hora_fin');
          ?>
          <p><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?></p>

        </div>
      </li>

      <?php endwhile; wp_reset_postdata(); ?>
    </ul>

    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$cantidad = !empty($instance['cantidad'] ) ? $instance['cantidad'] : esc_html__('¿Cuantas Clases Deseas Mostrar', 'gymproject'); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('cantidad'))?>" >
				<?php esc_attr_e('¿Cuantas Clases deseas mostrar?', 'gymproject'); ?>
			</label>

			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id('cantidad'))?>"
				name="<?php echo esc_attr( $this->get_field_name('cantidad'))?>"
				type="number"
				value="<?php echo esc_attr( $cantidad ) ?>"
			/>

		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';

		return $instance;
	}

} 

function gymproject_registrar_widget() {
  register_widget( 'Gymproject_Clases_Widget' );
}
add_action( 'widgets_init', 'gymproject_registrar_widget' );