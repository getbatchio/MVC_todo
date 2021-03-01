<?php include('header.php'); ?>
    <section class="item_list">
    <form action="." method="GET" class="filter_item_list">
        <input type="hidden" name="action" value="item_list">

        <label for="categoryID">Category: </label>
        <select name="categoryID" id="categoryID">
            <option value="" <?php echo (!$categoryID ? 'selected' : '') ?>>View All Categories</option>
            <?php foreach ($category_list as $category) {
                $id = $category['categoryID'];
                $categoryName = $category['categoryName'];
            ?>
            <option value="<?= $id ?>" <?php echo (isset($categoryID) && $categoryID == $id ? 'selected' : '') ?>><?= $categoryName ?></option>
            <?php } ?>
        </select>
        <button class="submit_btn">Submit</button>
    </form>

    <div class="list_container">
        <?php if (!empty($item_list)) { ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th> </th>
                </tr>

                <?php foreach ($item_list as $item) {
                    $itemNum = $item['ItemNum'];
                    $title = $item['Title'];
                    $description = $item['Description'];
                    $categoryID = $item['categoryID'];
                    $categoryName = get_category_name($categoryID) ?? 'None';
                ?>

                    <tr>
                        <td><?= $title ?></td>
                        <td><?= $description ?></td>
                        <td><?= $categoryName ?></td>
                        <td>
                            <form class="delete_form" action="." method="POST">
                                <input type="hidden" name="action" value="delete_item">
                                <input type="hidden" name="itemNum" value="<?= $itemNum ?>">
                                <button class="delete_btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No to do list items exist yet.</p>
        <?php } ?>
    </div>

    <p><a href="?action=add_item_form">Click here</a> to add a new item to the list.</p>
    <p><a href="?action=category_list">View/Edit Categories</a></p>
</section>
<?php include('footer.php'); ?>