<?php
require_once('model/database.php');
require_once('model/item_db.php');
require_once('model/category_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'item_list';
    }
}

switch ($action) {
    case 'item_list':
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
        if (!$categoryID) {
            $item_list = get_all_items();
        } else {
            $item_list = get_item_by_category($categoryID);
        }
        $category_list = get_categories();
        include('view/item_list.php');
        break;

    case 'add_item_form':
        $category_list = get_categories();
        include('view/add_item_form.php');
        break;

    case 'add_item':
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);

        if ($title && $description && $categoryID) {
            $count = add_item($title, $description, $categoryID);
            header("Location: .?added_item={$count}");
        } else {
            $error_message = 'Invalid to do data.';
            include('view/error.php');
        }
        break;

    case 'delete_item':
        $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
        if ($itemNum) {
            $count = delete_item($itemNum);
            header("Location: .?deleted_item={$count}");
        } else {
            $error_message = 'Invalid to do data';
            include('view/error.php');
        }
        break;

    case 'category_list':
        $category_list = get_categories();
        include('view/category_list.php');
        break;

    case 'add_category':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        if ($categoryName) {
            $count = add_category($categoryName);
            header("Location: .?action=category_list&added_category={$count}");
        } else {
            $error_message = 'Invalid category.';
            include('view/error.php');
        }
        break;
    case 'delete_category':
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($categoryID) {
            $count = delete_category($categoryID);
            header("Location: .?action=category_list&&deleted_category={$count}");
        } else {
            $error_message = 'Invalid category.';
            include('view/error.php');
        }
        break;

    default:
        header("Location: .");
        break;
}