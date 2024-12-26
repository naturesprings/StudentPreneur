<?php
function get_suppliers($limit) {
    global $db;
    $db = Database::getDB();
    $query = 'SELECT * FROM suppliers LIMIT :limit';
    $statement = $db->prepare($query);
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $suppliers
 = $statement->fetchAll();
    $statement->closeCursor();
    return $suppliers
;
}



function get_supplier($supplier_id) {
    global $db;
    $query = 'SELECT * FROM suppliers

              WHERE supplierID = :supplier_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':supplier_id', $supplier_id);
    $statement->execute();
    $supplier = $statement->fetch();
    $statement->closeCursor();
    return $supplier;
}

?>