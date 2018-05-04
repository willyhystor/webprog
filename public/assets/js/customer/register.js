$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('#register_submit').on('click', function(){
	$('#form_register').validate({ ignore : [] });

	var name = $('#customer_name').val();
	var email = $('#customer_email').val();
	var password = $('#customer_password').val();
	var password_confirm = $('#customer_password_confirm').val();
	var phone = $('#customer_phone').val();
	var gender = $('#customer_gender_male').val(); /*default gender => male*/
	var gender_opt = document.getElementsByName('customer_gender');
	var address = $('#customer_address').val();
	/*var form = new FormData(document.querySelector('input[type=file]').files[0]);*/
	var form = new FormData($("#form_register")[0]);
	/*form = form.append('csrfmiddlewaretoken', '{{ csrf_token }}');*/
	var picture_name = $('#customer_picture').val();

	/*validation time*/
	jQuery.validator.addMethod('letters', function(value) {
        if(value == '') {  
            return true;  
        } else {
            return value.match(/^[- a-zA-Z]+$/);
        }        
    });

	jQuery.validator.addMethod('check_first_name', function(value) 
	{
        if(value == '') 
        {  
            return true;  
        } 
        else 
        {
            return value.match(/^[a-zA-Z]+(.)*$/);
        }        
    }); 

    jQuery.validator.addMethod("number", function( value, element ) 
    {
        var regex = new RegExp("^[0-9]+$");
        var key = value;

        if (!regex.test(key)) 
        {
           return false;
        }
        return true;
    });

	jQuery.validator.addMethod("special_chars", function( value, element ) 
	{
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var key = value;

        if (!regex.test(key)) 
        {
           return false;
        }
        return true;
    });

    jQuery.validator.addMethod("special_chars_with_space", function( value, element ) 
    {
        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
        var key = value;

        if (!regex.test(key)) 
        {
           return false;
        }
        return true;
    });

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

    jQuery.validator.addMethod("match_pass",function(value) 
    {
        if(password == value)
        {
            return true;
        }
        else
        {
            return false;
        }
    });

    $('#customer_name').rules('add', 
    {
    	required: true,
    	letters: true,
    	minlength: 5,
    	maxlength: 20,
    	special_chars_with_space: true,
    	check_first_name: true,
    	messages:
    	{
    		required: 'Input your full name',
    		letters: 'Name must be a character',
    		minlength: 'Minimum characters are 5',
    		maxlength: 'Maximum characters are 16',
    		check_first_name: 'First letter must be a character'
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
        special_chars: true,
        minlength: 6,
        maxlength: 12,
        messages: 
        {
            required: 'Insert your password',
        	special_chars: 'Special characters not allowed',
            minlength: 'Minimum password are 6 characters',
            maxlength: 'Maximum password are 12 characters',
        }
    });

    $('#customer_password_confirmation').rules('add', {
        required: true,
        minlength: 6,
        maxlength: 12,
        match_pass: true,
        messages: 
        {
            required: 'Insert your password',
            minlength: 'Minimum password are 6 characters',
            maxlength: 'Maximum password are 12 characters',
            match_pass: 'Password does not match',
        }
    });

    $('#customer_phone').rules('add', {
        required: true,
        number: true,
        minlength: 6,
        maxlength: 12,
        messages: 
        {
            required: 'Insert your phone number',
            number: 'Special characters not allowed',
            minlength: 'Minimum 6 digits',
            maxlength: 'Maximum 12 digits',
        }
    });

    $('#customer_address').rules('add', {
        required: true,
        messages: 
        {
            required: 'Masukkan No. Telepon / HP anda',
        }
    });

    if(gender_opt[0].checked == true)
	{
		var gender = 'm';
	}
	if(gender_opt[1].checked == true)
	{
		var gender = 'f';
	}

    $('#customer_picture').rules('add', {
        required: true,
        messages: 
        {
            required: 'Masukkan Profile Picture anda',
        }
    });

    if($('#form_register').valid() == true)
    {
    	//langsung daftar, belum check email sudah keregis apa belum
    	$(this).attr('disabled', 'disabled');

    	$.ajax({
    		url: base_url+'/rest/register',
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
    		}
    	});
    }
});

$('#customer_picture').change(function(){
	var preview = document.querySelector('img');
  	var file = document.querySelector('input[type=file]').files[0];
  	var reader = new FileReader();

  	reader.addEventListener("load", function() 
  	{
    	preview.src = reader.result;
  	}, false);

  	if(file) 
  	{
    	reader.readAsDataURL(file);
  	}
});