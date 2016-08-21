<div class="right-box">
    <h2 class="right-box-header tag-icon"><span>Từ khóa nổi bật</span></h2>
    <ul class="right-box-content tag-box">
        <?php if(isset($__tag_box)&&  is_array($__tag_box)):?>
            <?php foreach ($__tag_box as $row):?>
        <li class="tag-item"><a class="tag-link" title="<?php echo $row->tag_name?>" href="<?php echo getLinkTag($row->tag_name_kd)?>"><?php echo $row->tag_name?></a><span class="tag-end">&nbsp;</span></li>
            <?php endforeach;?>
        <?php endif;?>
    </ul>
</div>