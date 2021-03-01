<?php
    function get_categories() {
        global $db;
        $query = "SELECT * FROM categories ORDER BY categoryID";
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    function get_category_name($categoryID) {
        global $db;
        $query = 'SELECT * FROM categories
                    WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $category = $statement->fetch();
        $statement->closeCursor();
        return $category['categoryName'] ?? null;
    }

    function add_category($categoryName) {
        global $db;
        $count = 0;
        $query = "INSERT INTO categories (categoryName)
                    VALUES (:categoryName)";
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $categoryName);

        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }

    function delete_category($categoryID) {
        global $db;
        $count = 0;
        $query = 'DELETE FROM categories
                    WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        if($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
