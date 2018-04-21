<section>
    <div class="col-xs-12 nav-bg">
    	<div class="col-xs-12 nav-header">
    		<div class="col-xs-8">
    			<ul class="nav-menu">
    				<li style="color: white;">KeLaNi Cake</li>
    				<li><a href="<?php echo URL::to('/'); ?>">Home</a></li>
    				<li><a href="<?php echo URL::to('/register'); ?>">Register</a></li>
    				<li><a href="<?php echo URL::to('/login'); ?>">Login</a></li>
    			</ul>
	        </div>
	        <div class="col-xs-4">
	        	<ul class="nav-menu" style="float: right;">
	        		<li>Hello, Guest</li>
	        		<li>
	        			<?php 
	        			$date = substr(date('l'), 0, 3).', '.date('m Y');
	        			echo $date;
	        			?>
	        		</li>
	        	</ul>
	        </div>
    	</div>
    </div>
</section>