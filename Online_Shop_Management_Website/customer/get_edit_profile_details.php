<?php
include("session_check.php"); 
if(isset($_GET['customer_id']))
	{
		$customer_id=$_GET['customer_id'];
		include("../include/connection.php");
		
		$sq="select * from customer_information where customer_id='$customer_id' ";
		$res=mysql_query($sq);
		$data=mysql_fetch_array($res);
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_edit_profile()"><h1><u>Edit Profile Details</u></h1>';
?>
	
		<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
		<style type="text/css">
			.form-style-10{
				width:450px;
				padding:30px;
				margin:40px auto;
				background: #FFF;
				border-radius: 10px;
				-webkit-border-radius:10px;
				-moz-border-radius: 10px;
				box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
				-moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
				-webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
			}
			.form-style-10 .inner-wrap{
				padding: 30px;
				background: #F8F8F8;
				border-radius: 6px;
				margin-bottom: 15px;
			}
			.form-style-10 h1{
				background: #2A88AD;
				padding: 20px 30px 15px 30px;
				margin: -30px -30px 30px -30px;
				border-radius: 10px 10px 0 0;
				-webkit-border-radius: 10px 10px 0 0;
				-moz-border-radius: 10px 10px 0 0;
				color: #fff;
				text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
				font: normal 30px 'Bitter', serif;
				-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				border: 1px solid #257C9E;
			}
			.form-style-10 h1 > span{
				display: block;
				margin-top: 2px;
				font: 13px Arial, Helvetica, sans-serif;
			}
			.form-style-10 label{
				display: block;
				font: 13px Arial, Helvetica, sans-serif;
				color: #888;
				margin-bottom: 15px;
			}
			.form-style-10 input[type="text"],
			.form-style-10 input[type="date"],
			.form-style-10 input[type="datetime"],
			.form-style-10 input[type="email"],
			.form-style-10 input[type="number"],
			.form-style-10 input[type="search"],
			.form-style-10 input[type="time"],
			.form-style-10 input[type="url"],
			.form-style-10 input[type="password"],
			.form-style-10 textarea,
			.form-style-10 select {
				display: block;
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				width: 100%;
				padding: 8px;
				border-radius: 6px;
				-webkit-border-radius:6px;
				-moz-border-radius:6px;
				border: 2px solid #fff;
				box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
				-moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
				-webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
			}

			.form-style-10 .section{
				font: normal 20px 'Bitter', serif;
				color: #2A88AD;
				margin-bottom: 5px;
			}
			.form-style-10 .section span {
				background: #2A88AD;
				padding: 5px 10px 5px 10px;
				position: absolute;
				border-radius: 50%;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				border: 4px solid #fff;
				font-size: 14px;
				margin-left: -45px;
				color: #fff;
				margin-top: -3px;
			}
			.form-style-10 input[type="button"],
			.form-style-10 input[type="submit"]{
				background: #2A88AD;
				padding: 8px 20px 8px 20px;
				border-radius: 5px;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				color: #fff;
				text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
				font: normal 30px 'Bitter', serif;
				-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				border: 1px solid #257C9E;
				font-size: 15px;
			}
			.form-style-10 input[type="button"]:hover,
			.form-style-10 input[type="submit"]:hover{
				background: #2A6881;
				-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
				-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
				box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
			}
			.form-style-10 .privacy-policy{
				float: right;
				width: 250px;
				font: 12px Arial, Helvetica, sans-serif;
				color: #4D4D4D;
				margin-top: 10px;
				text-align: right;
			}
		</style>
	
		<div class="form-style-10">
			
			
			<div class="section">Personal Information<p style="color:red;margin:0px;font-size:12px;display:none;" id="blank_msg"> ** Required feild is mandotory!!! </p></div>
			<div class="inner-wrap">
				<label>Name <p id="blank_msg1" style="display:none;color:red;"> *** </p> <input type="text" name="field1" id="name" value="<?php echo $data['name']; ?>" placeholder="Mr. Abcd Efgh"  required/></label>
				<label>Birthdate <input type="text" name="field2" id="birthdate" value="<?php echo $data['birthdate']; ?>" placeholder="DD MMM YYYY"></label>
				<label>Gender 
					<select name="field3" id="gender">
						<?php
							if($data['gender']!="")
							{
						?>
								<option value="<?php echo $data['gender']; ?>"><?php echo $data['gender']; ?></option>
								<?php if($data['gender']!="Male"){ ?><option value="Male">Male</option> <?php } ?>
								<?php if($data['gender']!="Female"){ ?><option value="Female">Female</option> <?php } ?>
								<?php if($data['gender']!="Other"){ ?><option value="Other">Other</option> <?php } ?>
						<?php
							}
							else
							{
						?>
								 <option value="">Select...</option>
								 <option value="Male">Male</option>
								 <option value="Female">Female</option>
								 <option value="Other">Other</option>
						<?php
							}
						?>
					</select>
				</label>
				<label>Email <p id="blank_msg2" style="display:none;color:red;"> *** </p> <input type="email" name="field4" id="email" value="<?php echo $data['email']; ?>" placeholder="abcd.efgh@example.com" required></label>
				<label>Contact <input type="text" name="field5" id="contact" value="<?php echo $data['contact']; ?>" placeholder="+8801........."></label>
				<label>Address <textarea name="field6" id="address" ><?php echo $data['address']; ?></textarea></label>
			</div>

			<div class="section">Username &amp; Password<p style="color:red;margin:0px;font-size:12px;display:none;" id="pass_msg"> Password doesn't match. </p></div>
			<div class="inner-wrap">
				<label>Username <p id="blank_msg3" style="display:none;color:red;"> *** </p> <input type="text" name="field3" id="username" value="<?php echo $data['username']; ?>" required/></label>
				<label>New Password <input type="password" name="field4" id="n_pass" title="Only for Change Password" placeholder="Use only for change old password"/></label>
				<label>Confirm New Password <input type="password" name="field4" id="c_n_pass" title="Only for Change Password" placeholder="Use only for change old password"/></label>
			</div>

			
			<div class="button-section">
			 <input type="submit" id="update" name="update" onclick="update_profile()" id="update" value="Save Change"  />
			</div>
			
		</div>
	
	
	
<?php	
		
		
	}
else
	{
		header("location: index.php");
	}
?>