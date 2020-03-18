<?php

include "crud_operation.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Output crud operation</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		
		th,td{
			text-align: center;
			color: blue;
		}

	</style>

</head>
<body>

<?php

$obj = new crudOperation();
echo $obj->setData("data.json")->addButton("add_item.php")->editBtn()->deleteBtn()->createTable();


?>


</body>
</html>