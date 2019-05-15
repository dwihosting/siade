$('select[name="kode_propinsi"]').on("change", function(){
    var id = $(this).val();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/kabupaten/get_kabupaten",
        data: {kode_propinsi:id},
        dataType:"json",
        success: function(msg) {
          var options = $('select[name="kode_kabupaten"]');
          options.empty();
          $.each(msg, function(data,item) {
                //console.log(item.kode_kabupaten);
                options.append($("<option />").val(item.kode_kabupaten).text(item.nama_kabupaten));
          });
        }
    });
})

$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_kecamatan' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/kecamatan/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/kecamatan";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_kecamatan' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/kecamatan/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/kecamatan";
          } else {
          }
        }
    });
    return false;
})
