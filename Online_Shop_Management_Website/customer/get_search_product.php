<?php
include("session_check.php");
if(isset($_GET['search_value']))
{
	include("../include/connection.php");
	$search_value=$_GET['search_value'];
?>	
					
	<?php
		$cou=0;
		
		$query="select * from product where name LIKE '%$search_value%' AND status='active' order by product_id desc ";
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