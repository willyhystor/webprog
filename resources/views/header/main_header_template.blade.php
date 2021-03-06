<section>
    <div class="col-xs-12 nav-bg">
    	<div class="col-xs-12 nav-header">
    		<div class="col-xs-8">
    			<ul class="nav-menu">
    				<li style="color: white;">KeLaNi Cake</li>
    				<li><a href="<?php echo URL::to('/'); ?>">Home</a></li>
    				<?php 
    				if(Session::has('profile'))
    				{
    					?>
    					<li><a href="<?php echo URL::to('/cart'); ?>">Cart</a></li>
    					<li><a href="<?php echo URL::to('/profile'); ?>">Profile</a></li>
    					<li><a href="<?php echo URL::to('/logout'); ?>">Logout</a></li>
    					<?php
    				}
                    else if(Session::has('admin'))
                    {
                        ?>
                        <li><a href="<?php echo URL::to('/profile'); ?>">Profile</a></li>
                        <li class="dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">Admin<span class="caret"></span></div>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URL::to('/manage-cake'); ?>">Manage Cakes</a></li>
                                <li><a href="<?php echo URL::to('/manage-profiles'); ?>">Manage Profiles</a></li>
                                <li><a href="<?php echo URL::to('/manage-categories'); ?>">Manage Categories</a></li>
                                <li><a href="<?php echo URL::to('/transaction-history'); ?>">Transaction History</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo URL::to('/logout'); ?>">Logout</a></li>
                        <?php
                    }
    				else
    				{
    					?>
    					<li><a href="<?php echo URL::to('/register'); ?>">Register</a></li>
    					<li><a href="<?php echo URL::to('/login'); ?>">Login</a></li>
    					<?php
    				}
    				?>
    			</ul>
	        </div>
	        <div class="col-xs-4">
	        	<ul class="nav-menu" style="float: right;">
	        		<?php 
	        		if(Session::has('profile'))
	        		{
    					$profile = Session::get('profile');
	        			?>
	        			<li>Hello, <?php echo $profile[0]['customer_name']; ?></li>
	        			<?php
	        		}
	        		else
	        		{
	        			?>
	        			<li>Hello, Guest</li>
	        			<?php
	        		}
	        		?>
	        		
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