<?php

class Participacao_Realizacao_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'participacao_realizacao_widget', __( 'Realização', 'participacao-tema' ),
                array( 'description' => __( 'Exibe os responsáveis pela organização do debate.', 'participacao-tema' ), )
        );
    }

    public function widget( $args, $instance ) {
        $maximoUmaColuna = 4; //a partir desse número haverá duas colunas
        $realizacao      = preg_split( "/[\n;,]/", $instance['realizacao'] );

        $temDuasColunas = count( $realizacao ) > $maximoUmaColuna;
        $limit          = (int) ( count( $realizacao ) / 2 ) - 1; //diminui 1 para sincronizar com contagem do array
        ?>
        <div class="container mt-lg">
            <div class="well well-sm">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h4 class="red font-roboto divider-bottom">
                            <strong><?php echo $instance['title'] ?></strong>
                        </h4>
                    </div>
                </div>
                <div class="row text-center mt-sm">
                    <div class="col-sm-<?php echo $temDuasColunas ? '6' : '12'; ?>">
                        <?php foreach ( $realizacao as $key => $item ) {
                            echo "<p>$item</p>";

                            if ( $temDuasColunas && $key == $limit ) {
                                echo '</div><div class="col-sm-6">';
                            }
                        }; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    public function form( $instance ) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'Realização', 'participacao-tema' );
        }


        if ( isset( $instance['realizacao'] ) ) {
            $realizacao = $instance['realizacao'];
        } else {
            $realizacao = '';
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'realizacao' ); ?>"><?php _e( 'Realização:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'realizacao' ); ?>"
                      name="<?php echo $this->get_field_name( 'realizacao' ); ?>" cols="50"
                      rows="10"><?php echo esc_attr( $realizacao ); ?></textarea>
            <span><i>Separe os responsáveis por vírgula, ponto-e-vírgula ou quebra de linha.</i></span>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance               = array();
        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['realizacao'] = ( ! empty( $new_instance['realizacao'] ) ) ? strip_tags( $new_instance['realizacao'] ) : '';

        return $instance;
    }
} ?>
