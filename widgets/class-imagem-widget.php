<?php

class Participacao_Imagem_Widget extends WP_Widget {
    function __construct() {
        parent::__construct( 'participacao_imagem_widget', __( 'Imagem', 'participacao-tema' ),
                array( 'description' => __( 'Widget de exibição simples de imagem.', 'participacao-tema' ), )
        );

        add_action( 'admin_enqueue_scripts', array( $this, 'upload_scripts' ) );
    }

    public function widget( $args, $instance ) { ?>
        <img src="<?php echo $instance['image']; ?>"
             class="<?php echo $instance['class']; ?>"
             alt="<?php echo $instance['desc']; ?>">
        <?php
    }

    public function form( $instance ) {

        if ( isset( $instance['image'] ) ) {
            $image = $instance['image'];
        } else {
            $image = "";
        }

        if ( isset( $instance['class'] ) ) {
            $class = $instance['class'];
        } else {
            $class = "img-adptive mt-lg";
        }

        if ( isset( $instance['desc'] ) ) {
            $desc = $instance['desc'];
        } else {
            $desc = "Widget de Imagem";
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Imagem:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>"
                   name="<?php echo $this->get_field_name( 'image' ); ?>" type="text"
                   value="<?php echo esc_attr( $image ); ?>"/>
            <input class="button button-primary pick_image_widget_button" type="button" value="Selecionar Imagem"/>
        </p>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Descrição:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>"
                   name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text"
                   value="<?php echo esc_attr( $desc ); ?>"/>
            <span><i>Campo com um descrição curta da imagem para fins de acessibilidade.</i></span>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'Classes CSS:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>"
                   name="<?php echo $this->get_field_name( 'class' ); ?>" type="text"
                   value="<?php echo esc_attr( $class ); ?>"/>
            <span><i>Campo para customização da imagem através de classes CSS. Se você não tem ideia do que isso faz,
                    mantenha os valores originais.</i></span>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';
        $instance['desc']  = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;
    }

    public function upload_scripts() {
        wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/js/imagem-widget.js', array( 'jquery' ) );
        wp_enqueue_media();
    }
}