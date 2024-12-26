<?php
function get_investors($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM investors LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $investors = $statement->fetchAll();
    $statement->closeCursor();
    return $investors;
}



function get_investor($investor_id) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM investors
              WHERE investorID = :investor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':investor_id', $investor_id);
    $statement->execute();
    $investor = $statement->fetch();
    $statement->closeCursor();
    return $investor;
}



?>