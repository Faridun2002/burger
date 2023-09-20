
<?php 
function add_post($name, $text, $status, $categoryId) {
    include_once('db.php');
    if (!empty($name) && !empty($text) && !empty($status) && !empty($categoryId)) {
    try {
        $query = "INSERT post (name, text, status, categoryId) VALUES (:name, :text, :status, :categoryId)";
    $sql = $db->prepare($query);
    $data = [
            'name' => $name,
            'text' => $text,
            'status' => $status,
            'categoryId' => $categoryId
        ]; $sql->execute($data);
    return true;
}
catch (PDOException $e) {
    echo $e->getMessage();
    return false;}
}
else { return false; }
}?>
