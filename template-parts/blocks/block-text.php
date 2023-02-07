<?php
$id = 'text-' . $block['id'];
?><section class="section section-white section-text <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-text__block">
            <?php if(get_field('content')):?><?php echo get_field('content');?><?php endif;?>
        </div>
    </div>
</section>