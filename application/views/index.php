<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ninja Gold</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
	<div id="container">
		<div class="header">
			<p>Your Gold: </p>
			<p><?php echo $this->session->userdata('gold_count'); ?></p>
		</div>
		<p class="goal">Gather 200 Gold Coins</p>
		<div class="destinations">
			<div class="farm">
				<h2>Farm</h2>
				<p>(earns 10-20 golds)</p>
				<form action="process_money" method="post">
					<input type='hidden' name='destination' value='farm'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class="cave">
				<h2>Cave</h2>
				<p>(earns 5-10 golds)</p>
				<form action="process_money" method="post">
					<input type='hidden' name='destination' value='cave'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class="house">
				<h2>House</h2>
				<p>(earns 2-5 golds)</p>
				<form action="process_money" method="post">
					<input type='hidden' name='destination' value='house'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class="casino">
				<h2>Casino</h2>
				<p>(earns/takes 0-50 golds)</p>
				<form action="process_money" method="post">
					<input type='hidden' name='destination' value='casino'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
		</div>
		Activities:
		<div class='log'>
			<?php 
				// set session log to local variable 
				$log = $this->session->userdata('log'); 
				for($x = count($log)-1; $x >= 0; $x--)
				{
					// echo each message in the user activities log
					echo $log[$x];
				}
				if($this->session->userdata('winner'))
				{
					?> 
					<!-- using javascript, alert the user that to won -->
					<script type="text/javascript">
						alert('Congradulations! You earned 200 Gold Coins. Play again...');
					</script>
					<?
					// set the counter back to 0
					$this->session->set_userdata('winner',0);
				}
			 ?>
			<p>Welcome to NinjaGold</p>
		</div>
	</div> <!-- End Container -->
</body> 
</head>