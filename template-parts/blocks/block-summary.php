<?php
$id = 'summary-' . $block['id'];

$left_column = get_field('left_column');
$right_column = get_field('right_column');
?>
<section class="section section-white section-summary <?php echo esc_attr( $block['className'] ); ?>" id="<?php echo $id;?>">
    <div class="container">
        <div class="section-summary__row">
            <div class="section-summary__media">
                <?php if($left_column['image']):?>
                    <?php for ($i = 0; $i < 3; $i++){?>
                    <div class="section-summary__media-item">
                        <img src="<?php echo $left_column['image'];?>" alt="<?php echo bloginfo('name');?>">
                    </div>
                    <?php } ?>
                <?php endif;?>
            </div>
            <div class="section-summary__content">
                <?php if($right_column['title']):?><span class="section__tag"><?php echo $right_column['title'];?></span><?php endif;?>
                <?php if($right_column['content']):?><?php echo $right_column['content'];?><?php endif;?>

                <?php if($right_column['lists']):?>
                    <div class="row">
                        <?php foreach ($right_column['lists'] as $list):?>
                        <div class="col col-12 col-sm-6">
                            <?php if($list['title']):?><h4><?php echo $list['title'];?></h4><?php endif;?>
                            <?php if($list['content']):?><?php echo $list['content'];?><?php endif;?>
                        </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>