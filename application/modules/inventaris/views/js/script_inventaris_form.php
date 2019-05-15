$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_kategori' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}inventaris/kategori/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}inventaris/kategori";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_kategori' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}inventaris/kategori/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}inventaris/kategori";
          } else {
          }
        }
    });
    return false;
})
