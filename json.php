<?php
 header('Content-type: application/json');
    class InventoryAPI {
    private $db;

    function __construct() {

    $this->db = new mysqli('localhost', 'selsebiil', 'wt', 'spajz');
    $this->db->autocommit(FALSE);

    }

    function __destruct() {
    $this->db->close();
    }

    function checkInv() {

    $query = "SELECT * FROM poruka";
    $result = $this->db->query($query);
    $rows = array();
    $i = 0;
    while($row = $result->fetch_assoc())
    {
        $rows[] = $row;
        $i++;
    }

    $result->close();
    $this->db->close();

    echo json_encode($rows);
    }

}

$api = new InventoryAPI;
$api->checkInv();
?>