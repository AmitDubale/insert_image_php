<?php
    require_once "db.php";
    $sql = "select * from output_images"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
    </head>
<BODY>




	<div class="container">
	<div class="row"><br>
	<div class="col-md-12">
		<a href="http://localhost/mysql_blob/index.php"><b>Back Form</b></a>
		<div><br>
		<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		
	

		<div class="col-md-6">
		<!-- code start -->
		<div class="twPc-div">
			<a class="twPc-bg twPc-block"><img src="imageView.php?image_id=<?php echo $row["imageId"]; ?>" class="img-responsive" /></a>
			<div>
				<div class="twPc-divUser">
					<div class="twPc-divName">
						<a href="#"><?php echo $row["event_title"]; ?></a>
					</div>
				</div>

				<div class="twPc-divStats">
					<ul class="twPc-Arrange">
						<li class="twPc-ArrangeSizeFit">
							<a href="#" title="9.840 Tweet">
								<span class="twPc-StatLabel twPc-block"><strong>Date</strong></span>
								<span class="twPc-StatValue" style="color: #000;"><?php echo $row["event_start"]; ?></span>
							</a>
						</li>
						<li class="twPc-ArrangeSizeFit">
							<a href="#" title="885 Following">
								<span class="twPc-StatLabel twPc-block">Location</span>
								<span class="twPc-StatValue"><?php echo $row["location"]; ?></span>
							</a>
						</li>
						<li class="twPc-ArrangeSizeFit">
							<a href="#" title="1.810 Followers">
								<span class="twPc-StatLabel twPc-block">Website</span>
								<span class="twPc-StatValue" ><a href="<?php echo $row["website"]; ?>" target="_blank" style="font-size:12px">Click Here</a></span>
							</a>
						</li>
						
					</ul>
					<h4 style="margin-top:30px;text-align:right;padding-right:10px;">Insights</h4>
				</div>
			</div>
		</div>
		<!-- code end -->
		
		
		
		</div>
<?php		
	}
    mysqli_close($conn);
?>
	</div>
	</div>
</BODY>
</HTML>


