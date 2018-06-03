$(document).ready(function() {
    $(document).on('click', '#submit_data', function() {
        let     tw1      =      $("#tw1").val(),
                tw2      =      $("#tw2").val(),
                tw3      =      $("#tw3").val(),
                tw4      =      $("#tw4").val(),
                unit     =      $("#id_unit").val(),
                jumlah   =      $("#content tr").length;

        $.ajax({
            url: '/pengukuran/tambah',
            method: 'GET',
            data: {
                tw1: tw1,
                tw2: tw2,
                tw3: tw3,
                tw4: tw4,
                unit: unit,
            },
            success: function(data) {
                alert('Data berhasil ditambahkan');

                $("#content").append(`
                    <tr>
                        <td>${ jumlah += 1 }</td>
                        <td>${ unit }</td>
                        <td style="color: white; background: ${cek(tw1)};">${ tw1 }</td>
                        <td style="color: white; background: ${cek(tw2)};">${ tw2 }</td>
                        <td style="color: white; background: ${cek(tw3)};">${ tw3 }</td>
                        <td style="color: white; background: ${cek(tw4)};">${ tw4 }</td>
                        <td><a href="/pengukuran/uk/${ unit }"><i class="glyphicon glyphicon-search"></i></a></td>
                    </tr>
                `);

                $("#tw1").val('');
                $("#tw2").val('');
                $("#tw3").val('');
                $("#tw4").val('');
            }
        })
    });

    function cek(number) {
        if(number >= 100) {
        return '#007f02';
        } else if(number >= 80 && number < 100) {
        return '#fdd700';
        } else {
        return '#fe0000';
        }
    }
});
