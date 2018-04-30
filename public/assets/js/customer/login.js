$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('#login_submit').on('click', function(){
	$('#form_login').validate({ ignore : [] });

	var email = $('#customer_email').val();
	var password = $('#customer_password').val();
    var remember = $('#remember_me').val();
    console.log(remember);
	var form = new FormData($("#form_login")[0]);

	/*validation time*/
    jQuery.validator.addMethod("email_reg",function(value) 
    {
    	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(re.test(email))
        {
            return true;
        }
        else
        {
            return false;
        }
    });

    $('#customer_email').rules('add', 
    {
        required: true,
        email: true,
        messages: 
        {
            required: 'Input your e-mail',
            email : 'E-mail format is not valid'
        }
    });

    $('#customer_password').rules('add', {
        required: true,
        minlength: 6,
        maxlength: 12,
        messages: 
        {
            required: 'Insert your password',
            minlength: 'Minimum password are 6 characters',
            maxlength: 'Maximum password are 12 characters',
        }
    });

    if($('#form_login').valid() == true)
    {
    	//langsung daftar, belum check email sudah keregis apa belum
    	$(this).attr('disabled', 'disabled');

    	$.ajax({
    		url: base_url+'/rest/login',
    		type: 'post',
    		data: form,
    		contentType: false,
    		cache: false,
    		processData: false,
    		success: function(data)
    		{
                var data = JSON.parse(data);
                if(data['status'] == 1)
                {
                    console.log('sukses');
                    window.location = base_url;
                }
                else
                {
                    console.log(data['message']);
                }
    		}
    	});
    }
});