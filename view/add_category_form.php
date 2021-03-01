<h2>Add Category</h2>
<form action="." method="POST" class="add_form">
    <input type="hidden" name="action" value="add_category">
    <div class="form_group">
        <label for="categoryName" class="form_label">Name: </label>
        <input class="form_field" type="text" name="categoryName" id="categoryName" maxlength="20" autocomplete="off" aria-label="Enter a category" aria-required="true" required>
    </div>
    <div class="form_group">
        <div></div>
        <button class="submit_btn">Add Category</button>
    </div>
</form>