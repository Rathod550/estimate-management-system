$(document).on("click", ".remove-crud", function(e) {
    e.preventDefault();
    var current_object = $(this);

    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this Record!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonClass: 'btn-default btn-md waves-effect',
        confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
        confirmButtonText: 'Delete!'
    }).then((result) => {
        if (result.isConfirmed) { 
            var action = current_object.attr('href');
            var id = current_object.attr('data-id');

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE',
                    id: id
                },
                success: function(response) {
                    console.log('Success:', response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', error);
                    console.error('Response Text:', xhr.responseText);
                    Swal.fire("Error!", "An error occurred while deleting the record.", "error");
                }
            });
        }
    });
});
