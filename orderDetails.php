<?php
//var_dump($_GET); die();

$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', '');


$requete1=$pdo->prepare('SELECT customerName, contactFirstName, contactLastName, addressLine1, addressLine2, city
                       FROM customers
                       INNER JOIN orders on orders.customerNumber=customers.customerNumber
                       WHERE orderNumber = ? ');

$requete1->execute(array($_GET['orderNumber']));                     

$customer = $requete1->fetch(PDO::FETCH_ASSOC);
//var_dump($customer) ;die();


$requete2=$pdo->prepare('SELECT orderLineNumber, productName, priceEach, quantityOrdered, (priceEach * quantityOrdered) AS PrixTotal
                       FROM orderdetails
                       INNER JOIN products ON products.productCode=orderdetails.productCode
                       WHERE orderNumber= ?
                       ORDER BY orderLineNumber ');

$requete2->execute(array($_GET['orderNumber'])); 

$orderdetails = $requete2->fetchAll(PDO::FETCH_ASSOC);
//var_dump($orderdetails) ;die();



$requete3=$pdo->prepare('SELECT SUM(priceEach * quantityOrdered) AS MontantTotalHT, 0.2*SUM(priceEach * quantityOrdered) AS TVA, 1.2*SUM(priceEach * quantityOrdered) AS MontantTTC
                       FROM orderdetails
                       WHERE orderNumber= ?');

$requete3->execute(array($_GET['orderNumber'])); 

$Montant = $requete3->fetch(PDO::FETCH_ASSOC);
//var_dump($MontantHT) ;die();


include 'orderDetails.phtml';