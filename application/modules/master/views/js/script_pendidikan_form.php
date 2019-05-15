$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_pendidikan' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/pendidikan/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/pendidikan";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_pendidikan' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/pendidikan/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/pendidikan";
          } else {
          }
        }
    });
    return false;
})
