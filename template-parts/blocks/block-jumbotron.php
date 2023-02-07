<?php
$id = 'jumbotron-' . $block['id'];

$left_column = get_field('left_column');
$right_column = get_field('right_column');
$subsection = get_field('subsection');
?>
<section class="section section-jumbotron <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-jumbotron__row">
            <div class="section-jumbotron__content" style="<?php if($left_column['background_image']):?>background-image: url(<?php echo esc_url($left_column['background_image']);?>);<?php endif;?>">
                <?php if($left_column['subtitle']):?><span class="section__tag"><?php echo esc_html($left_column['subtitle']);?></span><?php endif;?>
                <?php if($left_column['title']):?><h1><?php echo esc_html($left_column['title']);?></h1><?php endif;?>
            </div>
            <div class="section-jumbotron__form">
                <div class="form-block">
                    <?php if($right_column['content']):?>
                        <?php echo $right_column['content'];?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="section-jumbotron__partners">

            <?php if($subsection['title']):?>
                <h4><?php echo esc_html($subsection['title']);?></h4>
            <?php endif;?>

            <?php if($subsection['logos']):?>
                <div class="swiper-container partners-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($subsection['logos'] as $logo):?>
                        <div class="swiper-slide">
                            <span class="partners-slider__item">
                                <img src="<?php echo esc_url($logo);?>" alt="<?php echo bloginfo('name');?>">
                            </span>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>