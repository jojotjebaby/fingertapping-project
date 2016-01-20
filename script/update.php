<?php

include '../ext/connection.php';

$datum=date("Y-m-d H:i:s");
                                          
$stmt = $bdd->prepare("INSERT INTO results (name, firstname, groupes, points, datum) VALUES (:name, :firstname, :group, :points, '$datum')");
                                              
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);       
$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR); 
$stmt->bindParam(':group', $_POST['group'], PDO::PARAM_STR); 
$stmt->bindParam(':points', $_POST['points'], PDO::PARAM_INT);   
                     
$stmt->execute(); 