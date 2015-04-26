<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'head.php';
include 'connect.php';
$ticker = mysqli_real_escape_string($con, $_POST['ticker']);
$ticker1 = "'".$ticker."'";
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
$details = mysqli_real_escape_string($con, $_POST['trans']);
$sess = "'".$_SESSION['user_name']."'";
$id = $_SESSION['user_id'];
$comp = "select * FROM company as a,stock where ticker = ". $ticker1. " and a.id = company";
	$user = "select * from user where login = " .$sess. "";
	//echo $user;
	//echo $avail;
	$result = mysqli_query($con, $comp);
	$row = mysqli_fetch_array($result);
	$uresult = mysqli_query($con, $user);
	$urow = mysqli_fetch_array($uresult);
	$n = "'".$row['name']."'";
if($details == 'buy')
{   $flag=0;
	if($row['total']<$quantity)
	{
	    echo "Quantity available is lesser than demanded quantity. You'll be redirected in 3 seconds";
		$flag=1;
	}
	else if(($row['Price'] * $quantity > $urow['cash']) )
	{ $flag=1;
	    echo "Not Enough Cash. You'll be redirected in 3 seconds";
	}
	else
	{   
		
		
		$query1 = "update user set cash = ".$urow['cash']."-".$row['Price'] * $quantity." where login = " .$sess. "";
		$res = mysqli_query($con,$query1);
		$user = "select * from user where login = " .$sess. "";
		$uresult = mysqli_query($con, $user);
	$urow = mysqli_fetch_array($uresult);
	    //echo $query1;
		//echo $urow['cash'];
		$query2 = "update company set total = ".$row['total']." - ".$quantity." where name = " .$n. "";
		mysqli_query($con,$query2);
		$comp = "select * FROM company as a,stock where ticker = ". $ticker1. " and a.id = company";
		$result = mysqli_query($con, $comp);
	$row = mysqli_fetch_array($result);
	//echo $query2;
		//echo $row['total'];
	$own = "select * from ownership where user = ".$id." and stock = ".$row['id']."";
	//echo $own;
	$result1 = mysqli_query($con, $own);
	$orow = mysqli_fetch_array($result1);
		if($orow['user']==NULL)
		    {
				$query4 = "insert into ownership(user, stock, volume) values (".$id.",".$row['id'].",".$quantity.")";
				mysqli_query($con,$query4);
			}
			else
			{
			$query4 = "update ownership set volume = ".$orow['volume']."+".$quantity." where user = ".$id." and stock = ".$row['id']."";
	    mysqli_query($con,$query4);
			}
			//echo $query4;
	
           $query5 = "insert into buy(price,volume,stock,user) values(".$row['Price'].",".$quantity.",".$row['id'].",".$id.")";
		   mysqli_query($con,$query5);
		   
		$change = "update stock set Price = ".$row['Price']."+0.01*".$quantity."*".$row['Price']." where  ticker=" .$ticker1;
		$reschange = mysqli_query($con,$change);
		   
		   //echo $query5; 
	}if($flag==0)
	echo "Transaction success!!!You'll be redirected in 3 seconds";
}
else
{
	$own = "select * from ownership where user = ".$id." and stock = ".$row['id']."";
	$result10=mysqli_query($con,$own);
	$orow = mysqli_fetch_array($result10);
	
    if($orow['user']==NULL)
	{   
	    echo "You don't have this stock :( You'll be redirected in 3 seconds";}
	else if(($orow['volume']<$quantity)&& $orow['user']=!NULL)
	    echo "You are trying to sell more than what you have. You'll be redirected in 3 seconds";
		else{
			  $query1 = "update user set cash = ".$urow['cash']."+".$row['Price'] * $quantity." where login = " .$sess. "";
		$res = mysqli_query($con,$query1);
		$query2 = "update company set total = ".$row['total']." + ".$quantity." where name = " .$n. "";
		mysqli_query($con,$query2);
		
		
		
		
		
			if($orow['volume']>$quantity){
		    $query4 = "update ownership set volume = ".$orow['volume']."-".$quantity." where user = ".$id." and stock = ".$row['id']."";
	    mysqli_query($con,$query4);
		}
		else
		{
			$query4 = "delete from ownership where user = " .$id." and stock =".$row['id']."";
			mysqli_query($con,$query4);
		}
		$query5 = "insert into sell(price,volume,stock,user) values(".$row['Price'].",".$quantity.",".$row['id'].",".$id.")";
		   mysqli_query($con,$query5);
		   $change = "update stock set Price = ".$row['Price']."-0.01*".$quantity."*".$row['Price']." where  ticker=" .$ticker1;
		$reschange = mysqli_query($con,$change);
		}
		if($orow['user']!=NULL)
		echo "Transaction Successful You'll be redirected in 3 seconds";	
}

header("refresh:3; url=port.php");

?>
</body>
</html>