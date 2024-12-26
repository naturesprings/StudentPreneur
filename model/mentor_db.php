<?php
function get_mentors() {
    global $db;
    $query = 'SELECT * FROM mentors
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->execute();
    $mentors = $statement->fetchAll();
    $statement->closeCursor();
    return $mentors;
}



function get_mentor($mentor_id) {
    global $db;
    $query = 'SELECT * FROM mentors
              WHERE id = :mentor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':mentor_id', $mentor_id);
    $statement->execute();
    $mentor = $statement->fetch();
    $statement->closeCursor();
    return $mentor;
}



?>