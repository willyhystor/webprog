$('#register_submit').on('click', function(){
	$(this).attr('disabled', 'disabled');

	var token = $('#token_regis').val();
	var err_msg = '';
	var valid = 'true';
	var name = $('#customer_name').val();
	var mail = $('#customer_mail').val();
	var phone = $('#customer_phone').val();
	var password = $('#customer_password').val();
	var password_confirm = $('#customer_password_confirm').val();
	var gender = document.getElementsByName('customer_gender');
	var address = $('#customer_address').val();

	/*validation time*/
	if(name == '')
	{
		valid = 'false';
		$('#err_msg_name').html('Name must be filled');
	}
	else if(name.length < 5)
	{
		valid = 'false';
		$('#err_msg_name').html('Minimal 5 characters');
	}
	else if(name.length > 16)
	{
		valid = 'false';
		$('#err_msg_name').html('Maximal 16 characters');
	}

	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(mail == '')
    {
        valid = 'false';
        $('#err_msg_mail').html('Email must be filled');
    }
    else if(re.test(mail) == false)
    {
        valid = 'false';
        $('#err_msg_mail').html('Email format is not valid');
    }

    if(phone == '')
    {
    	valid = 'false';
    	$('#err_msg_phone').html('Phone number must be filled');
    }
    else if(isNaN(phone) == true)
    {
        valid = 'false';
    	$('#err_msg_phone').html('Number only');
    }

    if(password == '')
    {
    	valid = 'false';
    	$('#err_msg_password').html('Password must be filled');
    }
    else if(password_confirm == '')
    {
    	valid = 'false';
    	$('#err_msg_password_confirm').html('Password confirmation must be filled');
    }
    else if(password != password_confirm)
    {
        valid = 'false';
    	$('#err_msg_password_confirm').html('Password is mismatch');
    }

	if(gender[0].checked == true)
	{
		var gender = 'm';
	}
	else if(gender[1].checked == true)
	{
		var gender = 'f';
	}
	else
	{
        valid = 'false';
		$('#err_msg_gender').html('Choose your gender');
	}

	if(address == '')
	{
        valid = 'false';
		$('#err_msg_address').html('Address must be filled');
	}
	else if(address.length < 10)
	{
		valid = 'false';
		$('#err_msg_address').html('Minimal 10 characters');
	}

	console.log(valid);
	if(valid == 'true')
	{
		console.log('valid');
		$.ajax({
			url: base_url+'/rest/register',
			type: 'post',
			data: {name:name, mail:mail, phone:phone, password:password, gender:gender, address:address, _token:token},
			success: function(data)
			{
				var data = JSON.parse(data);
				console.log(data);
			}
		});
	}
});