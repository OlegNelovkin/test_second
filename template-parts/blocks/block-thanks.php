<?php
$id = 'thanks-' . $block['id'];
?><section class="section section-thanks <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-thanks__row" style="<?php if(get_field('background')):?>background-image: url(<?php echo esc_url(get_field('background'));?>);<?php endif;?>">
            <div class="section-thanks__txt">
                <?php if(get_field('title')):?>
                    <span class="section__tag"><?php echo get_field('title');?></h3></span>
                <?php endif;?>

                <?php if(get_field('content')):?>
                    <?php echo do_shortcode(get_field('content'));?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>