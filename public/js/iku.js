$(document).ready(function() {

    $(".update").on('click', function() {
        let   id  = $(this).attr('data-id');

        $.ajax({
          url: '/perencanaan/iku/edit/' + id,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            remove();

            $("#no").val(data.no);
            $("#sasaran").val(data.sasaran);
            $("#no_indikator").val(data.no_indikator);
            $("#indikator").val(data.indikator);
            $("#satuan").val(data.satuan);
            $("#target_tahunan").val(data.target_tahunan);
            $("#tahun").val(data.tahun);
            $("#periode").val(data.periode);

            $("form").attr('action',`/perencanaan/iku/update/${id}`);

            $("#submit_data").html('Update Data');
          }
        })
    });

    $(".created").on('click', function() {
      remove();
    });

    function remove() {
      $("#no").val('');
      $("#sasaran").val('');
      $("#no_indikator").val('');
      $("#indikator").val('');
      $("#satuan").val('');
      $("#target_tahunan").val('');
      $("#tahun").val('');
      $("#periode").val('');

      $("form").attr('action',`/perencanaan/iku/tambah`);

      $("#submit_data").html('Tambah Data');
    }

});
