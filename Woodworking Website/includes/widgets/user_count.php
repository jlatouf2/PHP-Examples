<div class="widget">
	<h2>Users</h2>
	<div class="inner">
		<?php
		$user_count = user_count();
		$suffix = ($user_count !=1) ? 's' : '';
		?>
		We currently have <?php echo user_count(); ?> registered users<?php echo $suffix; 
		//Note: only thing you need for user count is: echo user_count(); but above code adds an extra s...
		?>.
		
	</div>
</div>