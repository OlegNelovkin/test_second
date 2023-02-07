<?php
$id = 'jumbotron-' . $block['id'];
?><section class="section section-white section--news <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section__title">
            <?php if(get_field('title')):?>
                <h3><?php echo get_field('title');?></h3>
            <?php endif;?>
        </div>
        <?php if(get_field('news')):?>
            <div class="swiper-container news__slider">
                <div class="swiper-wrapper">

                    <?php foreach (get_field('news') as $new):?>
                    <div class="swiper-slide">
                        <div class="news__item">
                            <?php if($new['image']):?>
                                <span class="news__img">
                                    <img src="<?php echo $new['image'];?>" alt="<?php echo $new['title'];?>">
                                </span>
                            <?php endif;?>
                            <span class="news__title h3"><?php echo $new['title'];?></span>
                            <a href="<?php echo $new['link'];?>" class="news__link">Read more</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endif;?>
    </div>
    <div class="swiper-button-prev news-slider__prev"></div>
    <div class="swiper-button-next news-slider__next"></div>
    <div class="swiper-pagination news-slider__pagination"></div>
</section>