SELECT customerName, contactFirstName, contactLastName, addressLine1, addressLine2, city
FROM customers
INNER JOIN orders on orders.customerNumber=customers.customerNumber
WHERE orderNumber =10100

//=======================================================================================//
SELECT orderLineNumber, productName, priceEach, quantityOrdered, (priceEach * quantityOrdered) AS PrixTotal
FROM orderdetails
INNER JOIN products ON products.productCode=orderdetails.productCode
WHERE orderNumber= 10100
ORDER BY orderLineNumber 


//=======================================================================================//
SELECT SUM(priceEach * quantityOrdered) AS MontantTotalHt
FROM orderdetails
WHERE orderNumber= 10100

//=======================================================================================//
