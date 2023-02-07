<?php
$id = 'section-key-' . $block['id'];

$left_column = get_field('left_column');
$right_column = get_field('right_column');
?><section class="section section-white section-key <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-key__row">
            <div class="section-key__content">
                <?php if($left_column['title']):?><span class="section__tag"><?php echo $left_column['title'];?></span><?php endif;?>
                <?php if($left_column['content']):?><?php echo $left_column['content'];?><?php endif;?>
            </div>
            <div class="section-key__media">
                <?php if($right_column['image']):?>
                    <span class="section-key__media-photo">
                        <img src="<?php echo $right_column['image'];?>" alt="<?php echo bloginfo('name');?>">
                    </span>
                <?php endif;?>
                <div class="section-key__media-list">
                    <?php if($right_column['features']):?>
                    <div class="section-key-list-js swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($right_column['features'] as $feature):?>
                        <div class="swiper-slide">
                            <div class="section-key__media-col">
                                <div class="section-key__media-item">
                                    <?php if($feature['icon']):?><img src="<?php echo $feature['icon'];?>" alt="<?php echo bloginfo('name');?>"><?php endif;?>
                                    <?php if($feature['content']):?><?php echo $feature['content'];?><?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>