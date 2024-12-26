<?php
function get_users($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM users
              ORDER BY id
              LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}



function get_user($user_id) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM users
              WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function get_user_by_email($email){
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM users WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}


function delete_user($user_id) {
    global $db;
    $db = Database::getDB();
    $query = 'DELETE FROM users
              WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_user($first_name, $last_name, $email, $password) {
    global $db;
    $db = Database::getDB();
    $query = 'INSERT INTO users
                 (firstName, lastName, email, password)
              VALUES
                 (:first_name, :last_name, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function update_user($user_id, $first_name, $last_name, $email, $password) {
    global $db;
    $db = Database::getDB();
    $query = 'UPDATE users
              SET firstName = :first_name,
                  lastName = :last_name,
                  email = :email,
                  password = :password
              WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}
?>