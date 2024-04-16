# Eastvanstore Custom Print Page

- Custom printing page created for a client project. This page give the customer an option to choose the t-shirt size and color 
as well as logo color choices.
- After the selection customer can choose to add this product to the cart.
- At the cart and checkout customer can see the full description for the custom print product added.
- please visit the eastvanstore page at [Eastvanstore Custom Printing](https://www.eastvanstore.com/product/custom-print/)


## Built With

* [WordPress](https://www.wordpress.org) - The web framework used
* [WooCommerce](https://woocommerce.com/) - WP plugin
* [Custom build JavaScript and PHP](https://mackraicevic.com) - by Mack Raicevic

### Workflow guide

- custom build printing page will work with most WP and WooCommerce installations
- it was created as a product page and works by selecting specific product ID.
- insert all files inside of your custom built WordPress theme or child theme with WooCommerce installed
- Choose the custom product page and grab its ID from the url inside of the WP dashboard
- for the easier use I have defined a constant `CUSTOM_PRINT_PRODUCT_ID` inside of wordpress root `wp-config.php` and it depends on the env so that it works for local, stage and prod. This constant can also be declared in the `functions.php`, but since I already have other constants in `wp-config.php` I have used it there
- constant `CUSTOM_PRINT_PRODUCT_ID` value needs to be the value of the custom product ID
- inside of your theme create a woocommerce directory
    - then copy/paste the file from `wp-content/plugins/woocommerce/templates/content-single-product.php` into `your-theme/woocommerce/`
    - this file has been changed with the below code line, which you can find in the root of this project
    ```
    <?php if( $product->get_id() == CUSTOM_PRINT_PRODUCT_ID ): ?>
	    <?php include_once __DIR__ . '/../partials/custom-print/top-content-guide.php'; ?>
    <?php endif; ?>
    ```
    - for the easier use I have defined a constant `CUSTOM_PRINT_PRODUCT_ID` inside of wordpress root `wp-config.php` and it depends on the env so that it works for local, stage and prod


- other files that are in this projects are as follows:
    - top part of the page content `your-theme/partials/custom-print/top-content-guide.php`
    - content images `your-theme/partials/custom-print/product-images.php`
    - product summary `your-theme/partials/custom-print/product-summary.php`
    - printing options `your-theme/partials/custom-print/shirt-options.php`
    - woocommerce add to cart variable with the includes code. path to `your-theme/woocommerce/single-product/add-to-cart/variable.php`
    ```
    <?php // After the action hook do_action( 'woocommerce_before_add_to_cart_form' );
    <?php // Include shirt options if is Custom T-shirt Print product
    if( $product->get_id() == CUSTOM_PRINT_PRODUCT_ID ): ?>
    
    <?php include_once __DIR__ . '/../../../partials/custom-print/shirt-options.php'; ?>
    
    <?php endif; ?>
    ```

    - in addition to this there are ACF fields declared in the ACF options page so that client can select and choose which colors and logo options to choose from
    - to handle the changes, dropdown values with each selection a custom JavaScript (with jQuery block for ease of use) is created.
    - inside of `your-theme/js/customPrinting.js`
    - this file is only enqueued if the product page ID is used for custom printing
   


### Tested with versions

- PHP 8.0.0
- WP 6.5.2
- WooCommerce 8.3.1



## Author

* Mack Raicevic - Full Stack web Developer [portfolio website](https://mackraicevic.com)


## License

This project is licensed for the client use and not to be copied elsewhere


