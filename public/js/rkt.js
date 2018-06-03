$(document).ready(function() {

    $(".update").on('click', function() {
        let   id  = $(this).attr('data-id');

        $.ajax({
          url: '/perencanaan/rkt/edit/' + id,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            remove();

            $("#parent_rkt").prepend(`<option value="${data.parent_rkt}" default="" selected="">${data.sasaran}</option>`);
            $("#sasaran").val(data.sasaran);
            $("#2017").val(data.satu);
            $("#2018").val(data.dua);
            $("#2019").val(data.tiga);
            $("#2020").val(data.empat);

            $("form").attr('action',`/perencanaan/rkt/update/${id}`);

            $("#submit_data").html('Update Data');
          }
        })
    });

    $(".created").on('click', function() {
      remove();
    });

    function remove() {
      $("#sasaran").val('');
      $("#2017").val('');
      $("#2018").val('');
      $("#2019").val('');
      $("#2020").val('');
      $("form").attr('action',`/perencanaan/rkt/tambah`);

      $("#submit_data").html('Tambah Data');
    }

});
