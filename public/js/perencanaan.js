$(document).ready(function() {

    $(".update").on('click', function() {
        let   id  = $(this).attr('data-id');

        $.ajax({
          url: '/perencanaan/edit/' + id,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            $("#unitkerja").prepend(`<option value="${data.unitkerja_id}" default="" selected="">${data.nama_unit}</option>`);
            $("#tahun").val(data.tahun);
            $("#keterangan").val(data.keterangan);

            $(".modal-body").append(`
              <a href="/perencanaan/rkt/${data.unitkerja_id}" class="btn btn-primary">RKT</a>
              <a href="/perencanaan/iku/${data.unitkerja_id}" class="btn btn-primary">IKU</a>
            `);

            $("form").attr('action',`/perencanaan/update/${data.perancanaan_id}`);

            $("#submit_data").html('Update Data');
          }
        })
    });

});
