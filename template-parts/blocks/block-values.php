<?php
$id = 'values-' . $block['id'];

$left_column = get_field('left_column');
$right_column = get_field('right_column');
?><section class="section section-white section-values <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-values__row">
            <?php if($left_column['image']):?>
                <div class="section-values__photo">
                    <span class="section-values__photo-item">
                        <img src="<?php echo $left_column['image'];?>" alt="<?php echo bloginfo('name');?>">
                    </span>
                </div>
            <?php endif;?>
            <div class="section-values__content">
                <?php if($right_column['title']):?><span class="section__tag"><?php echo $right_column['title'];?></span><?php endif;?>
                <?php if($right_column['content']):?><?php echo $right_column['content'];?><?php endif;?>
            </div>
        </div>
    </div>
</section>