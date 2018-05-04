@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Manage Cakes</div>
    <div class="col-xs-4 col-xs-offset-4 bar-cen">
        <a href="<?php echo URL::to('/insert-cake'); ?>"><button class="btn btn-primary">Insert new cake</button></a>
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
                <!-- <div class=""><?php echo $value['product_description']; ?></div> -->
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <a href="<?php echo URL::to('/manage-cake/'.$value['product_id']); ?>"><button class="btn btn-primary">Manage cake</button></a>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo URL::to('/delete-cake/'.$value['product_id']); ?>"><button class="btn btn-primary">Delete cake</button></a>
                    </div>
                </div>
            </div>
            <?php   
        }
        ?>
    </div>
</div>

@endsection