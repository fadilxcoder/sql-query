# NOTES

## DB 

- *users* 1 - N *cards*
- *users* 1 - N *addresses*

- Update table with random integer : `UPDATE tbl_name SET column_name = CAST(RAND() * 10000<any range on number> AS UNSIGNED)`

 ## JOINS

<img src="./assets/join-illustration.jpg"/>

### Information

- FULL JOIN === FULL OUTER JOIN *Does not work in MySQL*
- LEFT OUTER JOIN === LEFT JOIN
- RIGHT OUTER JOIN === RIGHT JOIN
- INNER JOIN === JOIN
<br>

**Above illustration A is` users`, B is `cards`**
<br>

> SELECT U.id, U.fname, U.lname, C.type, C.amount
FROM `users` AS U 
INNER JOIN `cards` AS C 
WHERE C.uid = U.id

*Return only matched - 300,000 results*
<br>

> SELECT U.id, U.fname, U.lname, C.type, C.amount
FROM `users` AS U 
LEFT JOIN `cards` AS C 
ON C.uid = U.id

*Return matched & all in users - 2,969,158 results*
<br>

> SELECT U.id, U.fname, U.lname, C.type, C.amount
FROM `users` AS U 
RIGHT JOIN `cards` AS C 
ON C.uid = U.id

*Return matched & all in cards - 300,000 results*
<br>

## HAVING / GROUP BY

> SELECT U.id, U.fname, U.lname, C.amount
FROM `users` AS U 
INNER JOIN `cards` AS C 
ON C.uid = U.id
HAVING U.id < 100

*Return only matched & all user.id < 100 - 14 results*
<br>