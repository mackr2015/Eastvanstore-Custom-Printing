<div class="summary entry-summary">
    <?php 
        if(function_exists('black_friday_label')){
            if( black_friday_label($product->get_id()) !== ''){
                echo black_friday_label($product->get_id());
            }
        }
    ?>
<?php $tags = get_the_terms( $product->get_id(), 'product_tag' ); ?>
<?php if( $tags && $tags[0]->slug == 'best-seller' ):?>
<div class="tag_best_seller">
    <a href="<?php echo get_tag_link($tags[0]->term_id); ?>" target="_blank"><?php echo $tags[0]->name; ?></a>
</div>
<?php endif; ?>
<h2 class="title"><?php the_title(); ?></h2>
<span class="subtitle">Quality breathable materials</span>
    <?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
    do_action( 'woocommerce_single_product_summary' );
    ?>
</div>