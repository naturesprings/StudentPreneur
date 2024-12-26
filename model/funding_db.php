<?php
function get_fundings($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM fundings LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $fundings
 = $statement->fetchAll();
    $statement->closeCursor();
    return $fundings
;
}



function get_funding($funding_id) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM fundings

              WHERE fundingID = :funding_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':funding_id', $funding_id);
    $statement->execute();
    $funding = $statement->fetch();
    $statement->closeCursor();
    return $funding;
}

?>