<?php
function get_courses() {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM courses
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}



function get_course($course_id) {
    global $db;
    $query = 'SELECT * FROM courses
              WHERE courseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
}

?>