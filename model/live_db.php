<?php
function get_lives($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM lives LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $lives = $statement->fetchAll();
    $statement->closeCursor();
    return $lives;
}



function get_live($live_id) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM lives
              WHERE liveID = :live_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':live_id', $live_id);
    $statement->execute();
    $live = $statement->fetch();
    $statement->closeCursor();
    return $live;
}


?>