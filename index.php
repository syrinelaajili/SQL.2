<?php
//Construction 'un objet PDO représentant la connexion avec la base de données.

$pdo=new PDO('mysql:host=localhost;dbname=classicmodels;charset=utf8','root','');

//Exécution de la requete

$reponse = $pdo->query('SELECT orderNumber, orderDate, shippedDate, status
                        FROM orders
                        ORDER BY orderNumber');

//Récupération du résultat de la requete
$orders = $reponse->fetchAll(PDO::FETCH_ASSOC);

//var_dump($orders); die();






include 'index.phtml';