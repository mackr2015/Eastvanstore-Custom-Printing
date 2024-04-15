jQuery(document).ready(function($){

    // Custom Printing Page Template

    // Color Picker
    let colorPicker = $('.shirt_options #color_picker li');
    let colorPickerActive = $('.shirt_options #color_picker li.active');
   
    const wooShirtColor = $('table.variations #shirt-color');
    const wooShirtSize = $('table.variations #size');
    const wooChooseLogo = $('table.variations #choose-logo');
    let wooQuantity = $('.single_variation_wrap .woocommerce-variation-add-to-cart .quantity input');

    const shirtSize = $('#selectSize');

    const shirts = $('#shirts .shirts ul li');
    const shirtLogos = $('#shirts .logo ul li');
    const shirtLogoActive = $('#shirts .logo ul li.active');
    const shirtQuantity = $('.shirt_options .quantity input');

    const chooseLogo = $('.shirt_options .choose_logo #selectLogo');
    const chooseLogoOptions = $('.shirt_options .choose_logo #selectLogo option');
    /*
    * Fill in Shirt Options dropdowns values
    * On Page load assign woocommerce variation values 
    * 
    */
    // size select
    function wooVariatioSelect(sourceEl,targetEl){
        let optArrVal = [];
        sourceEl.find('option').each(function(){
            if( $(this).val() !== '' ){
                optArrVal.push($(this).val());
            }
        });

        for(let i = 0; i < optArrVal.length; i++){
            targetEl.append('<option value="' + optArrVal[i] + '">'+optArrVal[i]+'</option>');
        }
        if( sourceEl.val() !== ''){
            targetEl.val(sourceEl.val());
        }
        
    }

     // assign Shirt Size for Shirt Options
     wooVariatioSelect(wooShirtSize,shirtSize);

     // assign Shirt Logo for Shirt Options
     wooVariatioSelect(wooChooseLogo,chooseLogo);

    /* 
    * Shirt Option Color Picker
    */
    colorPicker.each(function(){
        // Assign on page load 
        if( $(this).hasClass('active') ){
            // Assign WooVariation for Shirt Color on page load
            wooShirtColor.val($(this).attr('data-color'))
        }

        $(this).on('click', function(){
            
            if( !$(this).hasClass('active') ) {
                colorPicker.removeClass('active');
                $(this).addClass('active');
                colorPickerActive = $(this);

                let colorPickerColor = $(this).attr('data-color');

                shirts.each(function(){
                    if( $(this).attr('data-label') == colorPickerColor ){
                        shirts.removeClass('active');
                        $(this).addClass('active');
                    }
                });

                // WooVariation Change on Colopicker change
                wooShirtColor.val($(this).attr('data-color'));
               
            }
        });
    });

   
    /* 
    * Shirt Option Choose Logo
    */
    // On load Select Logo match the acf php value
    if( shirtLogoActive.attr('data-logo') !== '' || shirtLogoActive.attr('data-logo')){
        chooseLogo.val(shirtLogoActive.attr('data-logo'));
        // Adjut the Woovariation Logo on page load
        if( wooChooseLogo.val() == '') {
            wooChooseLogo.val(shirtLogoActive.attr('data-logo'));
        }
    }

    // Select Logo on change
    chooseLogo.on('change', function(){
        // assign Woovariation val on Shirt Option logo change
        wooChooseLogo.val($(this).val());
      
        shirtLogos.each(function(){
            $(this).removeClass('active');
            
            if( $(this).attr('data-logo') === chooseLogo.val() ) {
                $(this).addClass('active');
            }
        });
        
    });

   /* 
    * Shirt Option Choose Size
   */
   // On load assign Woovariation value according to Shirt Options Size
   if( wooShirtSize.val() == '' ){
    wooShirtSize.val(shirtSize.val());
   }

   // On SHirt Option change assign woovariation value
   shirtSize.on('change', function(){
    wooShirtSize.val($(this).val());
   });

   /* 
    * Shirt Option Choose Quantity
   */
   // No need for page load assign
   // only on change
   shirtQuantity.on('keyup',function(){
    
    let changedVal = $(this).val();
    if( !isNaN(changedVal) && parseFloat(changedVal) < 0 ){
        // negative number used
        wooQuantity.val(1);
    }else {
        if( isNaN(changedVal) || changedVal == ''){
            wooQuantity.val(1);
        }else {
            wooQuantity.val(changedVal);
        }
    }
       
   });
    

    
});