@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Register</div>
    <div class="col-xs-12 form-sz">
        <form id="form_register" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="token_regis" id="token_regis" value="{{ csrf_token() }}"> -->
            <!-- <div id="csrf" class="hide">{{ csrf_token() }}</div> -->
            <div class="col-xs-offset-4 col-xs-8">
                <div class="col-xs-12">
                    <label for="customer_name" class="lbl-w">Fullname</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="customer_name" name="customer_name">
                    </div>
                </div>
                <div class="col-xs-12" style="margin-bottom: 15px !important;">
                    <label for="customer_email" class="lbl-w">E-mail address</label>
                    <div class="form-group" style="margin-bottom: 0px !important;">
                        <input type="text" class="form-control force-fc" id="customer_email" name="customer_email">
                    </div>
                    <span>We will never share your e-mail with anyone</span>
                </div>
                <div class="col-xs-12">
                    <label for="customer_phone" class="lbl-w">Phone number</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="customer_phone" name="customer_phone">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="customer_password" class="lbl-w">Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control force-fc" id="customer_password" name="customer_password">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="customer_password_confirmation" class="lbl-w">Confirm password</label>
                    <div class="form-group">
                        <input type="password" class="form-control force-fc" id="customer_password_confirmation" name="customer_password_confirmation">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="customer_gender" class="lbl-w">Gender</label>
                    <div class="form-group">
                        <input type="radio" id="customer_gender_male" name="customer_gender" value="m">Male
                        <input type="radio" id="customer_gender_female" name="customer_gender" value="f">Female
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="customer_address" class="lbl-w">Address</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="customer_address" name="customer_address">
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="customer_picture" class="lbl-w">Profile picture</label>
                    <div class="form-group">
                        <input type="file" class="form-control force-fc" id="customer_picture" name="customer_picture">
                        <img src="" height="200" atl="Image preview">
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="javascript:void(0)" id="register_submit" type="submit" class="btn btn-primary">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection