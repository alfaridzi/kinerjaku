$(document).ready(function() {

    $(".update").on('click', function() {
        let   id  = $(this).attr('data-id');

        $.ajax({
          url: '/perencanaan/edit/' + id,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            $("#unitkerja_id").prepend(`<option value="${data.unitkerja_id}" default="" selected="">${data.nama_unit}</option>`);
            $("#tahun").val(data.tahun);
            $("#keterangan").val(data.keterangan);

            $(".modal-body").append(`
              <a href="/perencanaan/rkt/${data.unitkerja_id}" class="btn btn-primary other-button">RKT</a>
              <a href="/perencanaan/iku/${data.unitkerja_id}" class="btn btn-primary other-button">IKU</a>
            `);

            $("form").attr('action',`/perencanaan/update/${data.perancanaan_id}`);

            $("#submit_data").html('Update Data');
          }
        })
    });

    $(".created").on('click', function() {
      remove();
    });

    function remove() {
      $("#tahun").val('');
      $(".other-button").remove();
      $("form").attr('action',`/perencanaan/tambah`);

      $("#submit_data").html('Tambah Data');
    }

});
