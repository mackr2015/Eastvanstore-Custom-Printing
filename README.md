# Eastvanstore Custom Print Page

- Custom printing page created for a client project. This page give the customer an option to choose the t-shirt size and color 
as well as logo color choices.
- After the selection customer can choose to add this product to the cart.
- At the cart and checkout customer can see the full description for the custom print product added.
- please visit the eastvanstore page at [Eastvanstore Custom Printing](https://www.eastvanstore.com/product/custom-print/)



## Getting Started

- custom build printing page will work wil most WP and WooCommerce installations
- it was created as a product page and works by selecting specific product ID.
- insert all files inside of the custom built WordPress theme
- WooCoomerce plugin needs to be installed and choose custom product page created. Grab its ID.
- inside of your theme create a woocommerce directory
    - then copy/paste the file from `wp-content/plugins/woocommerce/templates/content-single-product.php` into `your-theme/woocommerce/` with the same file name
    - for easier use I have defined a constant for the specific product page ID and inside of the `content-single-product.php` if this ID is used include your custom code
    - in this case include `your-theme/partials/custom-print/top-content-guide.php`
    - then this one `your-theme/partials/custom-print/product-images.php`
    - this one `your-theme/partials/custom-print/product-summary.php`
    - this one `your-theme/partials/custom-print/shirt-options.php`
    - and this one `your-theme/woocommerce/single-product/add-to-cart/variable.php`
    - in addition to this there are ACF fields declared in the ACF options page so that client can select and choose which colors and logo options.
    - to handle the changes, dropdown values with each selection a custom JavaScript is created.
    - inside of `your-theme/js/customPrinting.js`
    - this file is only enqueue if the product page ID is used for custom printing
    - inside of WooCommerce cart we need to check for the custom printing product and if it has been added
    - copy/paste the file from `wp-content/plugins/woocommerce/cart/cart.php` to `your-theme/woocommerce/cart/cart.php`
    - check for the `woocommerce/cart/cart.php` from this repo and you will see that there are references to the custom created constant `CUSTOM_PRINT_PRODUCT_ID`



### Tested with versions

- PHP 8.0.0 min
- WP 6.0.0 min
- WooCommerce 8.5.0


## Built With

* [WordPress](https://www.wordpress.org) - The web framework used
* [WooCommerce](https://woocommerce.com/) - WP plugin
* [Custom build JavaScript and PHP](https://mackraicevic.com) - by Mack Raicevic




## Author

* Mack Raicevic - Full Stack web Developer [portfolio website](https://mackraicevic.com)


## License

This project is licensed for client use and not to be copied elsewhere


