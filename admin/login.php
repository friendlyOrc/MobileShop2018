<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Mobile Shop - Administrator</div>
				<div class="panel-body">
					<?php
					// echo md5('G34r1'.'123456'.'xyz').'<br>';
					if(isset($_SESSION['account'])){
						header('location: admin.php');
					}
					if(isset($_POST['sbm'])){
						$account = $_POST['mail'];
						$raw_pass = $_POST['pass'];				
						$salt = 'G34r1';

						$sql_danh_sach = "select * from user where user_mail = '$account';";
						$data_sql = mysqli_query($connect, $sql_danh_sach);

						if($row = mysqli_fetch_array($data_sql)){
							$pass = md5($salt.$raw_pass.$row['user_salt']);
							// echo $pass;
							if($pass == $row['user_pass']){
								$date = date("D M d, Y G:i");

								$id = md5($salt.session_id().$row['user_salt']);
								
								session_commit();
								session_id($id);
								session_start();

								$_SESSION['CREATED'] = time(); 
								$_SESSION['account'] = $account;
								$_SESSION['pass'] = $pass;
								header('location: index.php');
							}else{
								$error = '<div class="alert alert-danger">Sai mật khẩu!</div>';
								echo $error;
							}
						}else{
							$error = '<div class="alert alert-danger">Tài khoản không tồn tại !</div>';
							echo $error;
						}

					}
					?>
					
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" class="btn btn-primary" name="sbm">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
