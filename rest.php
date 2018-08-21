<?php
require_once "src/Report.php";
require_once "myPdo.php";

$postData = file_get_contents("php://input");
$rep = new Report($pdo);
if (!empty($postData)) {

    $dataToSave = json_decode($postData, true);

    switch ($dataToSave['operation']) {

        case '1' :

            if ($rep->createReport($dataToSave)) {
                $rep->getReports();
            } else echo "can't record to database";
            break;

        case '2' :

            if ($rep->updateReport($dataToSave)){
                $statusMessage = "Report #".$dataToSave['id']."updated!";
                $rep->getReports($statusMessage);
            } else echo "can't update ".$dataToSave['id']." report" ;
            break;

        case '3' :
            if ($rep->deleteReport($dataToSave['id'])) {
                $rep->getReports();
            } else echo "can't delete from database";
            break;
    }


} else {
    $allRep = $rep->getReports();
    $json = json_encode($allRep);
    echo $allRep;
}


