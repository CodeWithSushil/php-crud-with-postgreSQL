<?php
require_once './php/function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP CRUD with PostgreSQL</title>
<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
}
html{
font-size: 62.5%;
}

form{
    width: 100%;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
padding: 0.5rem;
margin: auto!important;
}
form input{
    width: 100%;
padding: 0.6rem 1rem;
margin: 0.4rem 0rem;
outline: none;
border: 1px solid #05ff;
border-radius: 0.5rem;
}
h2{
color: #06ff;
text-align: center;
padding: 1rem;
}
[type="submit"]{
color:#fff;
background: #05ff;
font-size:15px;
outline:none;
}
table{
    display: table;
    border-collapse: collapse1;
    border-spacing: none;
    margin: 1rem auto;
    overflow: hidden;
    background-color: teal;
    border-radius: 0.5rem;
padding:0.5rem 0rem;
}
th{
    display: table-cell;
    background: teal;
    color: #fff;
}
td{
    display: table-cell;
    text-align: left;
    color: #fff;
    background: teal;
}
tr{
    border: none;
    outline: none;
    border-spacing: none;
}
td,th{
    padding: 0.8rem;
    outline: none;
    border: none;
    border-spacing: none;
}
a{
    text-decoration: none;
    padding: 0.45rem 1rem;
    border-radius: 0.4rem;
}
.e{
    color: #fff;
    background: rgb(40,220,50);
}
.d{
    color: #fff;
    background: rgb(250,30,40);
}
</style>
</head>
<body>
<h2> PHP CRUD with PostgreSQL </h2>
<form method="POST" action="./php/function.php">
<input type="text" name="Name" placeholder="Full name" required>
<input type="email" name="Email" placeholder="Email address" required>
<input type="submit" name="submit" value="Submit">
</form>
<table>
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$get = pg_query($con, 'SELECT * FROM test ORDER BY Name, Email DESC');
if (pg_num_rows($get) > 0) {
    $id = 1;
    while ($row = pg_fetch_assoc($get)) { ?>
<tr>
<td> <?php echo $id++; ?></td>
<td> <?php echo $row['name']; ?></td>
<td> <?php echo $row['email']; ?></td>
<td> <a class="e" href="./php/function.php?edit=<?php echo $row['id']; ?>">Edit</a>
<a class="d" href="./php/function.php?delete=<?php echo $row['id']; ?>">Delete</a>
 </td>
</tr>
<?php }
}
?>
</tbody>
</table>
<script></script>
<body>
</html>