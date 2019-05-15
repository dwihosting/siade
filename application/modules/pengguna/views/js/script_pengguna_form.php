var id = "{id}";
if (id){
    $(".btn-simpan").addClass("hide");
    $(".btn-ubah").removeClass("hide");
} else {
    $(".btn-simpan").removeClass("hide");
    $(".btn-ubah").addClass("hide");
}

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
                options.append($("<option />").val(item.kode_kabupaten).text(item.nama_kabupaten));
          });
        }
    });    
})


$('select[name="kode_kabupaten"]').on("change", function(){
    var id = $(this).val();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/kecamatan/get_kecamatan",
        data: {kode_kabupaten:id},
        dataType:"json",
        success: function(msg) {
          var options = $('select[name="kode_kecamatan"]');
          options.empty();
          $.each(msg, function(data,item) {
                options.append($("<option />").val(item.kode_kecamatan).text(item.nama_kecamatan));
          });
        }
    });    
})


$('select[name="kode_kecamatan"]').on("change", function(){
    var id = $(this).val();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/kelurahan/get_kelurahan",
        data: {kode_kecamatan:id},
        dataType:"json",
        success: function(msg) {
          var options = $('select[name="kode_kelurahan"]');
          options.empty();
          $.each(msg, function(data,item) {
                options.append($("<option />").val(item.kode_kelurahan).text(item.nama_kelurahan));
          });
        }
    });    
})


$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_pengguna' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}pengguna/akun/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}pengguna/akun";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_pengguna' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}pengguna/akun/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}pengguna/akun";
          } else {
          }
        }
    });
    return false;
})
