<?php
$id = 'partners-' . $block['id'];
?><section class="section section-white section-partners <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <?php if(get_field('title')):?>
            <h3><?php echo get_field('title');?></h3>
        <?php endif;?>
        <?php if(get_field('partners')):?>
        <div class="swiper-container partners-slider">
            <div class="swiper-wrapper">
                <?php foreach (get_field('partners') as $partner):?>
                    <div class="swiper-slide">
                        <span class="partners-slider__item">
                            <img src="<?php echo $partner;?>" alt="<?php echo bloginfo('name');?>">
                        </span>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>