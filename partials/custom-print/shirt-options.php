<?php 
$custom_printing_group = get_field('custom_printing_group','option');
$choose_tshirts = $custom_printing_group['choose_tshirts'];
$selected_logo = $custom_printing_group['choose_logo']['select_logo']['value'];
$logo_list = get_field_object('custom_printing_group','option')['sub_fields'][1]['sub_fields'][0]['choices'];

?>
<div class="shirt_options">
    <div class="colors">
        <span class="label">Change Color</span>
        <ul class="color_picker" id="color_picker">
            <?php $tshirt_name = []; ?>
            <?php foreach($choose_tshirts as $shirt): ?>
            <?php 
                $label_name = strtolower($shirt['image_name']);
                $label_name = preg_replace('/\s+/','',$label_name);
                $tshirt_name[] = $label_name;
                ?>
            <?php endforeach; ?>
            <?php 
            $colors_loop = 0;
            foreach( $choose_tshirts as $name): ?>
            <li class="color_<?=$name['image_name']?> <?php echo($colors_loop == 0 ? 'active':'');?>" data-color="<?=$name['image_name']?>"></li>
            <?php $colors_loop++; endforeach; ?>
        </ul>
    </div>

    <div class="quantity">
        <span class="label">Quantity</span>
        <input type="number" name="item_quantity" value="1">
    </div>

    <div class="choose_size">
        <span class="label">Choose Size</span>
        <select id="selectSize">
            <?php // Fill data with js, get data from woocommerce product variation ?>
        </select>
    </div>

    <div class="choose_logo">
        <span class="label">Choose Logo</span>
        <select id="selectLogo">
            <?php /* ?>
            <?php foreach( $logo_list as $key => $val ): ?>
            <option value="<?=$key?>" <?php echo( $selected_logo === $key)? 'selected="selected"':'';?>>
                <?=$val?>
            </option>
            <?php endforeach; ?>
            <?php */ ?>
        </select>
    </div>

</div>