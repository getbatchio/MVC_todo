<?php include('header.php'); ?>
    <section class="category_list">
    <h2>Category List</h2>
    <div class="list_container">
        <?php if (!empty($category_list)) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th> </th>
                </tr>
                <?php foreach ($category_list as $category) {
                    $categoryID = $category['categoryID'];
                    $categoryName = $category['categoryName'];
                ?>
                    <tr>
                        <td><?= $categoryName ?></td>
                        <td>
                            <form class="delete_form" action="." method="POST">
                                <input type="hidden" name="action" value="delete_category">
                                <input type="hidden" name="categoryID" value="<?= $categoryID ?>">
                                <button class="delete_btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No categories exist yet.</p>
        <?php } ?>
    </div>

    <?php include ('view/add_category_form.php'); ?>

    <p><a href=".">View To Do List</a></p>
</section>
<?php include('footer.php'); ?>