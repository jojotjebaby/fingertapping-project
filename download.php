<?php
  
  require_once('ext/connection.php'); 
    $sql= "SELECT name,firstname,groupes,points,datum FROM results ORDER BY datum";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $data = array();
    foreach($result as $row){ 
      $datarow = array("name" => $row['name'], "firstname" => $row['firstname'], "group" => $row['groupes'], "points" => $row['points'], "date" => $row['datum']);
      array_push($data, $datarow);
    }

  public function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // filename for download
  $filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  foreach($data as $row) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;

?>