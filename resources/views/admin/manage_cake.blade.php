@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Update Cake</div>
    <div class="col-xs-12 form-sz">
        <form id="form_update_cake" method="post" enctype="multipart/form-data">
            <div class="col-xs-offset-4 col-xs-8">
                <input type="hidden" id="current_cake_category" value="<?php echo $cake[0]['category_id']; ?>">
                <input type="hidden" id="cake_id" name="cake_id" value="<?php echo $cake[0]['product_id']; ?>">
                <div class="col-xs-12">
                    <label for="cake_category" class="lbl-w">Cake Category</label>
                    <div class="form-group">
                        <select class="form-control force-fc" id="cake_category" name="cake_category">
                            <option value="1">Chocolate Cake</option>
                            <option value="2">Cheese Cake</option>
                            <option value="3">Opera Cake</option>
                            <option value="4">Duo Cake</option>
                            <option value="5">Romantic Cake</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="cake_name" class="lbl-w">Cake Name</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="cake_name" name="cake_name" value="<?php echo $cake[0]['product_name']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="cake_price" class="lbl-w">Cake Price</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="cake_price" name="cake_price" value="<?php echo $cake[0]['product_price']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="cake_description" class="lbl-w">Cake Description</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="cake_description" name="cake_description" value="<?php echo $cake[0]['product_description']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="cake_picture" class="lbl-w">Cake Picture</label>
                    <div class="form-group">
                        <input type="file" class="form-control force-fc" id="cake_picture" name="cake_picture">
                        <img src="<?php echo URL::to('/').'/assets/images/cake_picture/'.$cake[0]['product_picture']; ?>" height="200" atl="Image preview">
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="javascript:void(0)" id="update_cake" type="submit" class="btn btn-primary">update Cake</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection