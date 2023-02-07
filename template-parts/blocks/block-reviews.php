<?php
$id = 'reviews-' . $block['id'];
$reviews = get_field('reviews');
if($reviews):
?><section class="section section-white section-reviews <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="swiper-container reviews-slider">
            <div class="swiper-wrapper">
                <?php foreach ($reviews as $review):?>
                    <div class="swiper-slide">
                        <div class="reviews-slider__item">
                                    <?php if($review['photo']):?>
                                        <span class="reviews-slider__avatar">
                                            <img src="<?php echo $review['photo'];?>" alt="<?php echo $review['name'];?>">
                                        </span>
                                    <?php endif;?>
                            <?php echo $review['content'];?>
                            <?php if($review['name']):?><span class="reviews-slider__title"><?php echo $review['name'];?></span><?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="swiper-button-prev reviews-slider__prev"></div>
    <div class="swiper-button-next reviews-slider__next"></div>
    <div class="swiper-pagination reviews-slider__pagination"></div>
</section>
<?php endif;?>