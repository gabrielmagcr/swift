<div class="container">
    <?php print get_sub_field('content'); ?>

    <form class="form--find-products form-inline" action="/store-locator" method="GET">
        <!-- <input type="text" placeholder="Enter Zip Code" name="zip" /> -->
        <button class="btn btn-outline-red" type="submit">Find Products</button>
    </form>
</div>