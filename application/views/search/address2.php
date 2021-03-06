
<div class="row">
	<div class="col-md-8">
		<h2>Transaction History</h2>
		<p class="lead">Address: <?php echo $this->uri->segment(3); ?></p>
		<hr>
		<?php
			if(!empty($transactions)) {
				echo '<table class="table">';
					echo '<tr><th>Block</th><th>TXID</th><th>To</th><th>From</th><th>Value</th></tr>';
					foreach($transactions as $t) {
						echo '<tr>';
							echo '<td><a href="/blocks/block/'.$t->blockNumber.'">'.$t->blockNumber.'</a></td>';
							echo '<td><a href="/txid/search/'.$t->txid.'">'.substr($t->txid, 0, 15).'...</a></td>';
							echo '<td><a href="/address/search/'.$t->to.'">'.substr($t->to, 0, 15).'...</a></td>';
							echo '<td><a href="/address/search/'.$t->from.'">'.substr($t->from, 0, 15).'...</a></td>';
							echo '<td>'.$t->transactionValue.'</td>';
						echo '</tr>';
					}
				
				echo '</table>';
			} else {
				echo '<p class="lead">Sorry, no transactions could be found!</p>';
			}
		?>
		
		
	
	</div>
	<div class="col-md-4">
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between align-items-center">POA Balance: <span class="badge badge-primary badge-pill" id="address_balance"></span></li>
			<li class="list-group-item d-flex justify-content-between align-items-center">Transaction Count: <span class="badge badge-primary badge-pill" id="address_count"></span></li>
			<li class="list-group-item d-flex justify-content-between align-items-center">POA Value: <span class="badge badge-primary badge-pill" id="address_value">Coming soon.</span></li>
			
		</ul>
		<?php
			$ethprice = json_decode(file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/'));
			$price = $ethprice[0]->price_usd;
		?>
		
		
		<p class="small">The POA Value was calculated using the ICO purchase price of .00023 ETH per POA token. The current price of Ethereum is $<span class="eth_price"><?php echo $price; ?></span>.</p>
	</div>
	
	
	
	

	
	