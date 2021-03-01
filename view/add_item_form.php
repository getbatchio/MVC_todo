<?php include('header.php'); ?>
    <section class="add_item_form">
    <h2>Add Item</h2>
    <form action="." method="POST" class="add_form">
        <input type="hidden" name="action" value="add_item">
        <div class="form_container">
           
            <div class="form_group">
                <label for="categoryID">Category: </label>
                <select name="categoryID" id="categoryID">
                    <?php foreach ($category_list as $category) {
                        $id = $category['categoryID'];
                        $categoryName = $category['categoryName'];
                    ?>
                    <option value="<?= $id ?>"><?= $categoryName ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form_group">
                <label for="title" class="form_label">Title: </label>
                <input type="text" name="title" id="title" maxlength="20" autocomplete="off" aria-label="Enter a title for to do" class="form_field" aria-required="true" required>
            </div>

            <div class="form_group">
                <label for="description" class="form_label">Description: </label>
                <input type="text" name="description" id="description" maxlength="50" autocomplete="off" aria-label="Enter a description for to do" class="form_field" aria-required="true" required>
            </div>
        </div>

        <div class="form_group">
            <div></div>
            <button class="submit_btn">Add Item</button>
        </div>
    </form>
    <p><a href=".">View To Do List</a></p>
</section>
<?php include('footer.php'); ?>