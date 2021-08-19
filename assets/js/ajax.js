$(document).ready(function() {
    $(document).on('click', '.save-category', function() {


        $.ajax({
            type: "post",
            url: "ajax.php",
            data: $('.category-form').serialize(),
            success: function(data) {
                var response = $.parseJSON(data);
                if (response.status == 1) {
                    Swal.fire(
                        'Category Created',
                        '',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            window.location = "category.php";
                        }
                    });
                } else {
                    Swal.fire('Error in creating category!', '', 'error')
                }

            }
        })

    })
    $(document).on('click', '.update-category', function() {
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: $('.category-form').serialize(),
            success: function(data) {
                var response = $.parseJSON(data);
                if (response.status == 1) {
                    Swal.fire(
                        'Category Updated',
                        '',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            window.location = "category.php";
                        }
                    });
                } else {
                    Swal.fire('Error in updating category!', '', 'error')
                }

            }
        })
    })

    $(document).on('click', '.delete-category', function() {
        var id = $(this).data('id');
        var action = $(this).data('action');
        Swal.fire({
            icon: 'info',
            title: 'Do you want to delete category?',
            showDenyButton: true,
            confirmButtonText: `Yes`,
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                id: id,
                action: action
            },
            success: function(data) {
                var response = $.parseJSON(data);
                if (response.status == 1) {
                    Swal.fire(
                        'Category Deleted',
                        '',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            window.location = "category.php";
                        }
                    });
                } else {
                    Swal.fire('Error in deleting category!', '', 'error')
                }

            }
        })
    }
})
    })
        $(document).on('click', '.upload-book', function() {
            var formdata = new FormData($('.books-details')[0])
            $.ajax({
                type: "post",
                url: "ajax.php",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    var response = $.parseJSON(data);
                    if (response.status == 1) {
                        Swal.fire(
                            'Books Uploaded',
                            '',
                            'success'
                        ).then(function(result) {
                            if (result.value) {
                                window.location = "books.php";
                            }
                        });
                    } else {
                        Swal.fire('Error in deleting books!', '', 'error')
                    }

                }
            })
        })

    
    // update book
    $(document).on('click', '.update-book', function() {
        var formdata = new FormData($('.books-details')[0])
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                var response = $.parseJSON(data);
                if (response.status == 1) {
                    Swal.fire(
                        'Book Details Updated',
                        '',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            window.location = "books.php";
                        }
                    });
                } else {
                    Swal.fire('Error in deleting books!', '', 'error')
                }

            }
        })
    })


    $(document).on('click', '.delete-book', function() {
        var id = $(this).data('id');
        var action = $(this).data('action');
         Swal.fire({
            icon: 'info',
            title: 'Do you want to delete book?',
            showDenyButton: true,
            confirmButtonText: `Yes`,
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                id: id,
                action: action
            },
            success: function(data) {
                var response = $.parseJSON(data);
                if (response.status == 1) {
                    Swal.fire(
                        'Book  Deleted',
                        '',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            window.location = "books.php";
                        }
                    });
                } else {
                    Swal.fire('Error in deleting category!', '', 'error')
                }

            }
        })
    }
})
})
})