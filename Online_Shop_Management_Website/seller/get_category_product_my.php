<?php
include("session_check.php");
if(isset($_GET['category_id']))
{
	include("../include/connection.php");
	session_start();
	$seller_id=$_SESSION['session_id'];
	session_write_close();
	$category_id=$_GET['category_id'];
?>	
					
	<?php
		$cou=0;
		
		$query="select * from product where category_id='$category_id' AND status='active'   AND seller_id='$seller_id'  order by product_id desc ";
		$result=mysql_query($query);
		while($data=mysql_fetch_array($result))
		{
			$cou=1;
		
	?>
				<div id="product_view" onclick="open_details(<?php echo $data['product_id']; ?>)" title="Click for details of this product.">
					<?php 
						$query2="select * from product_picture where product_id='$data[product_id]' ";
						$result2=mysql_query($query2);
						$arr=mysql_fetch_array($result2);
					?>
					<img src="../images/products/<?php if(mysql_num_rows($result2)!=0){ echo $arr['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="height:100px;width:140px;border-radius:5px;">
					<h3 style="color:brown;margin-top:5px;margin-bottom:0px;"> <?php echo $data['name']; ?> </h3>
					<h4 style="color:black;margin:5px 0px 0px 0px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
					<h4 style="color:blue;margin:5px 0px 0px 0px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
				</div>
				
	<?php
			
		}	
		if($cou==0)
		{
			echo '<h1 style="color:red;text-align:center;font-size:60px;margin-top:180px;">Oops no products available!!!</h1>';
		}
	?>
	
	
<?php
	}
else
	{
		header("location: index.php");
	}
?>