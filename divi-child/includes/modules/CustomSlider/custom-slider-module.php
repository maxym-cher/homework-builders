<?php
class Custom_Slider_Module extends ET_Builder_Module {

    // Module slug and name
    public function init() {
        $this->name = esc_html__( 'Custom Testimonials Slider', 'et_builder' );
        $this->slug = 'et_pb_custom_reviews_slider';
    }

    // Define module settings
    public function get_fields() {
        return array(
            'comments_count' => array(
                'label' => esc_html__( 'Number of comments to display', 'et_builder' ),
                'type' => 'text',
                'description' => esc_html__( 'Enter the number of comments you want to display.', 'et_builder' ),
                'toggle_slug' => 'main_content',
            ),
            'category' => array(
                'label' => esc_html__( 'Category', 'et_builder' ),
                'type' => 'select',
                'options' => $this->get_categories(),
                'description' => esc_html__( 'Select the category from which you want to display reviews.', 'et_builder' ),
                'toggle_slug' => 'main_content',
            ),
        );
    }

    public function render( $attrs, $content = null, $render_slug ) {
        ob_start();
        wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/includes/modules/CustomSlider/custom-slider-module.js', [ 'jquery' ], filemtime( get_stylesheet_directory() . '/includes/modules/CustomSlider/custom-slider-module.js' ), true );
        wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/plugins/slick.min.js', null, '1.8.1', true );
        wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
        wp_enqueue_style( 'custom-slider', get_stylesheet_directory_uri() . '/includes/modules/CustomSlider/style.css' );

        $comments_count = isset( $this->shortcode_atts['comments_count'] ) ? absint( $this->shortcode_atts['comments_count'] ) : 5;
        $category = isset( $this->shortcode_atts['category'] ) ? sanitize_text_field( $this->shortcode_atts['category'] ) : '';

        $comments_query = new WP_Query([
            'post_type' => 'testimonials',
            'posts_per_page' => $comments_count,
            'tax_query' =>
            array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'portfolio_categories',
                    'field' => 'term_taxonomy_id',
                    'terms' => $category,
                ),
            )
        ]); ?>

        <div class="testimonials-slider">
        <?php foreach ( $comments_query->posts as $comment ) { ?>
            <div class="testimonials-slider-item-wrap">
                <div class="testimonials-slider-item">
                    <div class="testimonials-image-wrap">
                        <img alt="test" src="<?php echo get_the_post_thumbnail_url($comment->ID)?>">
                        <span class="testimonials-quote">“</span>
                    </div>
                    <div class="testimonials-content-wrap">
                        <p><?php echo $comment->post_content; ?></p>
                        <h4><b>- Parent name</b> <?php echo $comment->post_title;?></h4>
                    </div>
                </div>
            </div>
        <?php  }  ?>
        </div>
        <?php  return ob_get_clean();
        }

    protected function get_categories() {
        $categories = get_categories( array(
            'taxonomy' => 'testimonials_categories',
            'hide_empty' => false,
        ) );

        $options = array();
        foreach ( $categories as $category ) {
            $options[ $category->term_id ] = $category->name;
        }

        return $options;
    }
}
new Custom_Slider_Module();