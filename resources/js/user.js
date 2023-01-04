$(document).ready(function () {
    $(document).on("click", "#addUser", function () {
        $("#userModal").modal("show");
    });

    $("#msg-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#msg-alert").slideUp(500);
    });

    $(document).on("click", ".updateUser", function () {
        let id_user = $(this).attr("id");
        $.ajax({
            'url': 'UserController/getUser',
            'data': {
                id: id_user
            },
            'type': 'post',
            'dataType': 'html',
            'beforeSend': function () {
            }
        }).done(function (response) {
                $("#responseModal").html(response);
                $('#userModalUpdate').modal('show');
            })
            .fail(function (code, status) {
                console.log("error ajax")
            })
    });

    $(document).on("click", ".deleteUser", function () {
        let id_user = $(this).attr("id");
        Swal.fire({
            title: '¿Are you sure to delete this user?',
            icon: 'info',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'Yes',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: 'No',
            cancelButtonAriaLabel: 'Thumbs down'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteUser(id_user)
            }
        })
    });


    function deleteUser(id_user) {
        $.ajax({
            'url': 'UserController/deleteUser',
            'data': {
                id: id_user
            },
            'type': 'post',
            'dataType': 'html',
        }).done(function (result) {            
            let response = JSON.parse(result)            
            Swal.fire(response.msg, '', response.type).then((result) => {
                if (result.isConfirmed && response.type !=='warning') {
                    location.reload()
                }
            })
        })
    }
});
