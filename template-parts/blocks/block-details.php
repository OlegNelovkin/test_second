<?php
$id = 'details-' . $block['id'];

$left_column = get_field('left_column');
$right_column = get_field('right_column');
?>
<section class="section section--details <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section--details__row">
            <div class="section--details__content">
                <?php if($left_column['title']):?>
                    <div class="section__title">
                        <h2><?php echo $left_column['title'];?></h2>
                    </div>
                <?php endif;?>
                <?php if($left_column['content']):?>
                    <?php echo $left_column['content'];?>
                <?php endif;?>
            </div>
            <?php if($right_column['images']):?>
                <div class="section--details__slider">
                    <div class="swiper-container details-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($right_column['images'] as $image):?>
                            <div class="swiper-slide">
                                <div class="details-slider__item">
                                    <img src="<?php echo $image;?>" alt="<?php echo bloginfo('name');?>">
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="swiper-pagination details-slider__pagination swiper-pagination-details"></div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>