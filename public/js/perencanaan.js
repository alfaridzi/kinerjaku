$(document).ready(function() {

    $(document).on('click', '#submit_data', function() {
        let     unit     =      $("#id_unit").val(),
                rensra   =      $("#rensra").prop('files'),
                pk       =      $("#pk").prop('files');

        $.ajax({
            url: '/perencanaan/tambah',
            method: 'GET',
            data: {
                rensra: rensra,
                pk: pk,
                unit: unit,
            },
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data) {
                alert('Data berhasil ditambahkan');

                console.log(data);

                $("#id_unit").val('');
                $("#rensra").val('');
                $("#pk").val('');
            }
        });
    });

});
