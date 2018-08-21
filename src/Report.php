<?php

require_once getcwd() . "/myPdo.php";

class Report
{

    public function __construct($pdo)
    {
        return $this->pdo = $pdo;
    }




    public function createReport($data)
    {


        $stmt = $this->pdo->prepare("INSERT INTO reports (id,host, code, message,created) VALUES (NULL,:host, :code, :message, CURRENT_TIMESTAMP)");

        $stmt->bindParam(':host', $data['host']);
        $stmt->bindParam(':code', $data['code']);
        $stmt->bindParam(':message', $data['message']);
        return $stmt->execute();

    }

    public function getReports($statusMessage = "")
    {
        $allReports = [];


        $stmt = $this->pdo->query('SELECT * FROM reports');

        foreach ($stmt as $row) {
            $allReports[$row['id']]['id'] = $row['id'];
            $allReports[$row['id']]['host'] = $row['host'];
            $allReports[$row['id']]['message'] = $row['message'];
            $allReports[$row['id']]['code'] = $row['code'];
        }
        $allReports['statusMessage'] = $statusMessage;
        $json = json_encode($allReports);
        echo  $json;

    }


    public function updateReport($data)
    {
        $stmt = $this->pdo->prepare("UPDATE reports SET host=:host, code=:code, message=:message  WHERE id=:id");
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':host', $data['host']);
        $stmt->bindParam(':code', $data['code']);
        $stmt->bindParam(':message', $data['message']);
        return $stmt->execute();

    }

    public function deleteReport($id)
    {
        $stmt = $this->pdo->prepare(" DELETE FROM reports WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
