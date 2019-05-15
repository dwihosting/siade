$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_agama' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/agama/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/agama";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_agama' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/agama/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/agama";
          } else {
          }
        }
    });
    return false;
})
