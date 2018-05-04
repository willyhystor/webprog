@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">My Profile</div>
    <div class="col-xs-12 form-sz">
        <form id="form_profile" method="post" enctype="multipart/form-data">
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_name" class="lbl-w">Fullname</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="text" class="form-control force-fc-2" id="customer_name" name="customer_name" value="<?php echo $profile[0]['customer_name']; ?>">
                    </div>
                </div>
                <div class="col-xs-12" style="margin-bottom: 15px !important;">
                    <div class="col-xs-2">
                        <label for="customer_email" class="lbl-w">E-mail address</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="text" class="form-control force-fc-2" id="customer_email" name="customer_email" value="<?php echo $profile[0]['customer_email']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_phone" class="lbl-w">Phone number</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="text" class="form-control force-fc-2" id="customer_phone" name="customer_phone" value="<?php echo $profile[0]['customer_phone']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_password" class="lbl-w">Password</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="password" class="form-control force-fc-2" id="customer_password" name="customer_password">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_password_confirmation" class="lbl-w">Confirm password</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="password" class="form-control force-fc-2" id="customer_password_confirmation" name="customer_password_confirmation">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_gender" class="lbl-w">Gender</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="radio" id="customer_gender_male" name="customer_gender" value="m" <?php if($profile[0]['customer_gender'] == 'm'){echo 'checked';} ?>>Male
                        <input type="radio" id="customer_gender_female" name="customer_gender" value="f" <?php if($profile[0]['customer_gender'] == 'f'){echo 'checked';} ?>>Female
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_address" class="lbl-w">Address</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="text" class="form-control force-fc-2" id="customer_address" name="customer_address" value="<?php echo $profile[0]['customer_address']; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-2">
                        <label for="customer_picture" class="lbl-w">Profile picture</label>
                    </div>
                    <div class="form-group col-xs-10">
                        <input type="file" class="form-control force-fc" id="customer_picture" name="customer_picture">
                        <img src="<?php echo URL::to('/').'/assets/images/profile_picture/'.$profile[0]['customer_picture']; ?>" height="200" atl="Image preview">
                    </div>
                </div>
                <div class="col-xs-offset-2 col-xs-10">
                    <a href="javascript:void(0)" id="update_profile" type="submit" class="btn btn-primary">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection