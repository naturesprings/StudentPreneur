<?php
function search_users_by_tag($tag) {
    global $db;

    try{
        $db = Database::getDB();
        $query = 'SELECT id, firstName, lastName, description, avatar FROM users WHERE description LIKE :description';
        $statement = $db->prepare($query);
        $statement->bindValue(':description', '%' . $tag . '%');
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();

        return $users;

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return [];
    }

}
?>