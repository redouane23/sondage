$(document).ready(function () {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    //disabled btn
    $('body').on('click', '.disabled', function (e) {

        e.preventDefault();

    });//end of disabled

    //update sondage btn
    $('body').on('click', '.update-sondage-btn', function (e) {

        e.preventDefault();
        var user_id = $(this).data('user_id');
        var sondage_id = $(this).data('sondage_id');
        var type = $(this).data('type');

        //alert(type);

        $.ajax({

            type: 'PUT',
            data: {user_id: user_id, sondage_id: sondage_id, type: type},
            url: 'sondages/updated',


            success: function (data) {

                //alert(data.sondage_id);
                window.location.href = "show_" + data.sondage_id;


            },
            error: function (data) {

                console.log('Error:', data);

            }

        });

    });//end of update sondage btn


});//end of document ready
