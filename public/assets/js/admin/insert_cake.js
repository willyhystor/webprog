$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('#insert_cake').on('click', function(){
	$('#form_insert_cake').validate({ ignore : [] });
    
	var form = new FormData($("#form_insert_cake")[0]);

	/*validation time*/
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

    $('#cake_name').rules('add', 
    {
        required: true,
        minlength: 5,
        number: false,
        messages: 
        {
            required: 'Input cake name',
            minlength: 'Minimum 5 characters',
            number: 'No numbers allowed'
        }
    });

    $('#cake_price').rules('add', 
    {
        required: true,
        number: true,
        messages: 
        {
            required: 'Input cake\'s price',
            number: 'Only numbers allowed'
        }
    });

    $('#cake_description').rules('add', 
    {
        required: true,
        minlength: 10,
        messages: 
        {
            required: 'Input cake\'s description',
            minlength: 'Minimum 10 characters',
        }
    });

    $('#cake_picture').rules('add', {
        required: true,
        messages: 
        {
            required: 'Insert cake\'s picture',
        }
    });

    if($('#form_insert_cake').valid() == true)
    {
    	//langsung daftar, belum check email sudah keregis apa belum
    	$(this).attr('disabled', 'disabled');

    	$.ajax({
    		url: base_url+'/rest/insert-cake',
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
                    window.location = base_url+'/manage-cake';
                }
                else
                {
                    console.log(data['message']);
                }
    		}
    	});
    }
});

$('#cake_picture').change(function(){
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