<?php
function get_workshops($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM workshops LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $workshops = $statement->fetchAll();
    $statement->closeCursor();
    return $workshops;
}



function get_workshop($workshop_id) {
    global $db;
    $query = 'SELECT * FROM workshops
              WHERE workshopID = :workshop_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':workshop_id', $workshop_id);
    $statement->execute();
    $workshop = $statement->fetch();
    $statement->closeCursor();
    return $workshop;
}

?>