<?php 
    $custom_printing_group = get_field('custom_printing_group','option');
    $choose_tshirts = $custom_printing_group['choose_tshirts'];
    $selected_logo = $custom_printing_group['choose_logo']['select_logo']['value'];
    $logo_list = get_field_object('custom_printing_group','option')['sub_fields'][1]['sub_fields'][0]['choices'];
?>
<div id="shirts" class="shirts_wrapper">
    <div class="shirts">
        <ul>
            <?php $tshirt_name = []; ?>
            <?php $shirt_loop = 0; ?>
            <?php foreach($choose_tshirts as $shirt): ?>
                <?php 
                    $label_name = strtolower($shirt['image_name']);
                    $label_name = preg_replace('/\s+/','',$label_name);
                    $tshirt_name[] = $label_name;
                    ?>
                <li <?php echo($shirt_loop == 0 ? 'class="active"':'');?> data-label="<?=$label_name;?>">
                    <img src="<?php echo $shirt['image']['url'];?>" alt="<?php echo $shirt['image']['title'];?>">
                </li>
            <?php $shirt_loop++; endforeach; ?>
        </ul>

        
    </div>

    <div class="logo">
        <ul>
            <?php foreach( $logo_list as $key => $val ): ?>
            <li <?php echo($selected_logo === $key)?'class="active"':'';?> data-logo="<?=$val?>">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/imgs/shirt-logo/<?=$key?>-logo.png" alt="<?=$val?>">
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    
    
</div>