<?php
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    require_once "db.php";
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	$event_pay = $_POST['event_pay'];
	$event_title = $_POST['event_title'];
	$organizer = $_POST['organizer'];
	$website = $_POST['website'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$ticket_type = $_POST['ticket_type'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$event_start = $_POST['event_start'];
	$event_end = $_POST['event_end'];
	
	$sql = "INSERT INTO output_images(imageType ,imageData, event_pay, event_title,organizer, website, category, description, location, ticket_type, qty, price, event_start, event_end)
	VALUES('{$imageProperties['mime']}', '{$imgData}', '$event_pay', '$event_title', '$organizer', '$website', '$category', '$description', '$location', '$ticket_type', '$qty', '$price', '$event_start', '$event_end')";
	$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
	if(isset($current_id)) {
		header("Location: listImages.php");
	}
}
}
?>
<!--<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>

</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>
</div>
</BODY>
</HTML>-->


<!DOCTYPE html>
<html lang="en">
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
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="background-color: #fff;">
                    <h2>Genaral Info</h2> 
             
                    <form role="form" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
                       
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="name" class="label1"> Paid</label>
                                <input type="radio" id="paid" name="event_pay" value="paid" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="name" class="label1"> Free</label>
                                <input type="radio" id="free" name="event_pay" value="free" required>
                            </div>
							
							<div class="col-sm-4 form-group">
                                <label for="name" class="label1"> Sponser</label>
                                <input type="radio" id="sponser" name="event_pay" value="sponser" required>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" class="label1"> Event Title</label>
                                <input type="text" class="form-control" id="name" name="event_title" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email" class="label1"> Organizer</label>
                                <input type="text" class="form-control" id="email" name="organizer" required>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" class="label1"> Website</label>
                                <input type="text" class="form-control" id="name" name="website" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email" class="label1"> Category</label>
								<select name="category" id="category" class="form-control" required>
								  <option value="">Select Category</option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								</select>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message" class="label1"> Description</label>
                                <textarea class="form-control" type="textarea" name="description" id="description" maxlength="6000" rows="4"></textarea>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" class="label1"> Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email" class="label1"> Location Link</label>
                                <input type="text" class="form-control" id="location_links" name="location_links" required>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" class="label1"> Image</label>
                                <input type="file" class="form-control" id="name" name="userImage" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email" class="label1"> Add Attendee</label>
                                <input type="text" class="form-control" id="add_attendee" name="add_attendee" >
                            </div>
                        </div><br>
						
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="name" class="label1"> Event Ticket</label>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="name" class="label1"> Ticket Type</label>
                                <input type="text" class="form-control" id="ticket_type" name="ticket_type" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="email" class="label1"> Qty</label>
                                <input type="text" class="form-control" id="qty" name="qty" required>
                            </div>
							<div class="col-sm-4 form-group">
                                <label for="email" class="label1"> Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                        </div><br>
						
						<div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="name" class="label1"> Date and Time</label>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" class="label1"> Event Start</label>
                                <input type="datetime-local" class="form-control" id="birthdaytime" name="event_start" required>
                            </div>
							<div class="col-sm-6 form-group">
                                <label for="email" class="label1"> Event End</label>
                                <input type="datetime-local" class="form-control" id="birthdaytime" name="event_end" required>
                            </div>
                        </div>
						
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" id="submit" name="done" value="Submit" class="butt">Save Event &rarr;</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>