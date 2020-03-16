<?php

require __DIR__ . '/db_connection.php';

class CRUD
{

    protected $db;

    function __construct()
    {
        $this->db = DB();
    }

    function __destruct()
    {
        $this->db = null;
    }

    /*
     * Add new Customer
     * */
    public function Create($first_name, $last_name, $town_name, $gender_id)
    {
        $query = $this->db->prepare("INSERT INTO customer(first_name, last_name, town_name, gender_id) VALUES (:first_name,:last_name,:town_name,:gender)");
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("town_name", $town_name, PDO::PARAM_STR);
        $query->bindParam("gender", $gender_id, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }

    /*
     * Read all Customers
     * */
    public function Read()
    {
        $query = $this->db->prepare("SELECT *, customer.id AS cust_id FROM customer INNER JOIN gender on customer.gender_id = gender.id WHERE is_deleted=:del");
        $query->execute(array(":del"=>0));
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    /*
     * Delete Customer
     * */
    public function Delete($user_id)
    {
        $query = $this->db->prepare("UPDATE customer SET is_deleted = :del WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->bindParam("del", $del_no, PDO::PARAM_INT);
        $del_no=1;
        $query->execute();
    }

    /*
     * Update Customer
     * */
    public function Update($first_name, $last_name, $town_name,$gender_id, $user_id)
    {
        $query = $this->db->prepare("UPDATE customer SET first_name = :first_name, last_name = :last_name, town_name = :town_name, gender_id = :gender  WHERE id = :id");
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("town_name", $town_name, PDO::PARAM_STR);
        $query->bindParam("gender", $gender_id, PDO::PARAM_STR);
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    /*
     * Get Customer
     * */
    public function Details($user_id)
    {
        $query = $this->db->prepare("SELECT *, gender.id AS gen_id FROM customer INNER JOIN gender ON customer.gender_id = gender.id WHERE customer.id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
    public function Gender()
    {
        $query = $this->db->prepare("SELECT * FROM gender ");
        $query->execute();
        $gend= array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $gend[] = $row;
        }
        return $gend;
    }
}

?>