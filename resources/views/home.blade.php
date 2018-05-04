@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Our Products</div>
    <div class="col-xs-4 col-xs-offset-4 bar-cen">
    	search bar
    </div>
    <div class="col-xs-12 pad-menu">
    	<?php 
    	foreach ($cakes as $key => $value) 
    	{
    		?>
    		<div class="col-xs-4 center">
    			<img src="<?php echo URL::to('/').'/assets/images/cake_picture/'.$value['product_picture']; ?>" height="240" width="240">
    			<div class=""><?php echo $value['product_name']; ?></div>
    			<div class=""><?php echo $value['product_price']; ?></div>
    			<div class=""><?php echo $value['product_description']; ?></div>
    		</div>
    		<?php	
    	}
    	?>
    </div>
</div>

@endsection