$(document).on('change', '.service-id', function(e) {
	e.preventDefault();
	var serviceId = $(this).val();
	if(serviceId != ""){
		getEstimateContent(serviceId);
	}else{
		$(".service-content").html("");
	}
});

function getEstimateContent(serviceId){
	$.ajax({
        url: '/admin/estimate/get-estimate-content',
        type: 'POST',
        data: {_token: token,service_id: serviceId},
        success: function(data) {
            $(".service-content").append(data.view);
        }
    });
}

$(document).on('keyup', ".price", function() {
    let total = 0;

    var serviceId = $(this).data('id');

    // Loop through each element with the class 'price'
    $(".price-service-"+serviceId).each(function() {
        // Get the value of the current element and convert it to a number
        let value = parseFloat($(this).val());

        // Check if the value is a number and add it to the total
        if (!isNaN(value)) {
            total += value;
        }
    });

    // You can now use the 'total' variable for whatever you need
    var className = 'total-price-'+serviceId;
    $("."+className).val(total);
});

// estimate form submit
var estimate = {
    success: function(response)
    {
        $('.error-text').text('');
        $(".estimate-save-btn").attr("disabled", false);
        $(".estimate-save-btn").html('Save');
        if($.isEmptyObject(response.error)){
            window.location.href = response.view;
        }else{
            $.each(response.error, function(key, value) {

                // Replace all dots in the key with underscores
                var keyWithUnderscores = key.replace(/\./g, '_');
                $.each(value, function(skey, svalue) {
                    $('.' + keyWithUnderscores + '_err').text(svalue);  // Use the modified key in the selector
                });
            });
        }
    }
};

$(document).on('click','.estimate-save-btn',function (e) {
    e.preventDefault();
    $(this).attr("disabled", true);
    $(this).html('<i class="fa fa-spinner fa-spin"></i> Save');
    $(this).parents("form").ajaxSubmit(estimate);
});

// Attach a change event to all checkboxes with data-service-id
$('input[data-service-id]').on('change', function() {
    const serviceId = $(this).data('service-id'); // Get the data-service-id value
    if ($(this).is(':checked')) {
        getEstimateContent(serviceId);     
    } else {
        var className = 'service-'+serviceId;
        $("."+className).remove();
    }
});

$(document).on('click','.reset-btn',function(){
    location.reload(true);
});