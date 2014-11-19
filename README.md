WooCommerce-Hide-Add-to-Cart
============================

Quick snippet of code that allows you to make items non-purchasable based on their category.




Instructions/Usage (WooCommerce 2.2+) :
You can include this file into your Theme functions file (functions.php) via 

	include 'hide-from-cart.php'


However the fastest and easiest way to include this will be to copy and paste the code between the // marks into your functions.php file.  
Change the strings in the $array_categories to the names of the categories.


NOTE: for categories with special characters in their require use of a special method, htmlspecialchars()  .  There is an example of it in the code snippet: a category named "Sweet & Sour" will not match a string == 'Sweet & Sour' because of the strip_tags method used further below.  

In order to remedy this situation we use htmlspecialchars('Sweet & Sour', ENT_QUOTES) which will allow it to evaluate correctly.

*strip_tags method is used because product categories are returned as html href's and not simple strings.
