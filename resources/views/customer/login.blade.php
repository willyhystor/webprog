@extends('templates.main_template')

@section('content')

<div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4 reg-cen">Login</div>
    <div class="col-xs-12 form-sz">
        <form id="form_login" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="token_regis" id="token_regis" value="{{ csrf_token() }}"> -->
            <!-- <div id="csrf" class="hide">{{ csrf_token() }}</div> -->
            <div class="col-xs-offset-4 col-xs-8">
                <div class="col-xs-12">
                    <label for="customer_email" class="lbl-w">Email</label>
                    <div class="form-group">
                        <input type="text" class="form-control force-fc" id="customer_email" name="customer_email" value="<?php echo isset($email)? $email : ''; ?>">
                    </div>
                </div>
                <div class="col-xs-12" style="margin-bottom: 15px !important;">
                    <label for="customer_password" class="lbl-w">Password</label>
                    <div class="form-group" style="margin-bottom: 0px !important;">
                        <input type="password" class="form-control force-fc" id="customer_password" name="customer_password" value="<?php echo isset($password)? $password : '';?>">
                    </div>
                </div>
                <div class="col-xs-12" style="margin-bottom: 15px !important;">
                    <input id="remember_me" name="remember_me" type="checkbox" <?php echo isset($checked)? $checked: ''; ?> ><label for="remember_me">Remember Me</label>
                </div>
                <div class="col-xs-12">
                    <a href="javascript:void(0)" id="login_submit" type="submit" class="btn btn-primary">Login</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection