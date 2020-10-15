<?php
	//Database configuration
	include "Config.php";

	//Start session
	session_start();

	if(isset($_POST["submit"]))
	{
			$ItemArrayID = array_column($_SESSION["FeedbackLs"], "submit");

			if(!in_array($_POST["submit"], $ItemArrayID))
			{
				$Count = count($_SESSION["FeedbackLs"]);
				$ItemArray	= array(
					'submit' => $_POST["submit"],
					'CustName' => $_POST["your_name"],
					'CustRate' => $_POST["rating"],
					'CustComments' => $_POST["comments"]
	
				);
				$_SESSION["FeedbackLs"][$Count] = $ItemArray;
			}		
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title> Feedback</title>
	<meta charset="utf-8">
	<meta name="author" content="Eddie Liew">
	<meta name="description" content="Feedback form">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="feedback.css">
</head>

<body>
	<div class="bg" id="background">

		<div class="mask rgba-black-light align-items-center">
			<!-- Feedback Title -->
			<div class="container">
				<div class="row">
					<div class="col-md-12 white-text text-center">
						<h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 wow fadeInDown"
							data-wow-delay="0.3s"><strong>Feedback</strong></h1>
						<hr id="linee" data-wow-delay="0.4s">
					</div>
				</div>
			</div>
		</div>


		<div class="mask rgba-gradient align-items-center">
			<!-- Left table -->
			<div class="container">
				<div class="row mt-5">
					<div class="col-md-6 mb-5 mt-md-0 white-text text-center text-md-left" id="result12">

						<?php
										$connection = mysql_connect("localhost","root","");
										$db = msql_select_db($connection, $query);

										$query = "SELECT * FROM feedback";
										$query_run = mysql_query($connection, $query);
                                    ?>

						<table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0"
							width="100%">
							<thead class="thead-dark">
								<tr>
									<th class="th-sm" style="text-align: center">Customer Feedback</th>

								</tr>
							</thead>
						</table>

						<!-- moving feedback -->
						<marquee id="marquee1" scrollamount="4" direction="up" height="350px">
							<?php
										if($query_run)
										{
											foreach($query_run as &row)
											{
										?>
							<div class="col-12">
								<div class="p-3" id="reviews">

									<!--from database

													<div class="review">
														<h6><?php echo $row['CustName']; ?>, <em>Rate:</em> <?php echo $row['CustRate']; ?> star</h6>
														<p><?php echo $row['CustComments']; ?></p>
													</div>

													-->

									<div class="review">
										<h6>Alex, <em>Rate:</em> 5 star</h6>
										<p>I really enjoy their food. This is the best!</p>
									</div>

									<div class="review">
										<h6>Joe, <em>Rate:</em> 4 star</h6>
										<p>Good Service! I would recommend.</p>
									</div>

									<div class="review">
										<h6>Emily, <em>Rate:</em> 5 star</h6>
										<p>I was happy with the food. Customer service was great. Highly recommended.
										</p>
									</div>

								</div>
							</div>
						</marquee>
					</div>

					<!-- Right feedback form -->

					<div class="col-md-6 col-xl-5 mb-4">
						<div class="card wow fadeInRight" data-wow-delay="0.3s">
							<div class="card-body">
								<!--Header-->
								<div class="text-center" id="he3">
									<h3> Tell us your experience?</h3>
									<hr class="hr-light">
								</div>
								<!--Body-->
								<div class="md-form">
									<label for="form3" id="t1" class="active">Your name</label>
									<i class="fas fa-user prefix white-text active"></i>
									<input type="text" id="form3" name="your_name" class="white-text form-control"
										required>
								</div>

								<label for="form3" id="t1" class="active">How would you rate the overall
									experience?</label>
								<div class="rating">
									<input type="radio" name="rating" value="5" id="5">
									<label for="5">☆</label>

									<input type="radio" name="rating" value="4" id="4">
									<label for="4">☆</label>

									<input type="radio" name="rating" value="3" id="3">
									<label for="3">☆</label>

									<input type="radio" name="rating" value="2" id="2">
									<label for="2">☆</label>

									<input type="radio" name="rating" value="1" id="1">
									<label for="1">☆</label>
								</div>

								<div class="md-form">
									<label for="form2" id="t1" class="active">Any comments or suggestions</label>
									<i class="fas fa-envelope prefix white-text active"></i>
									<textarea name="comments" id="form2" class="white-text form-control" rows="3"
										cols="28"></textarea>
								</div>

								<div class="text-center mt-5">
									<button type="submit" class="btn btn-primary" id="SubB" name="submit"
										value="Submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>