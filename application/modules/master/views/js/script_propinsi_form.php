$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_propinsi' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/propinsi/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/propinsi";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_propinsi' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}master/propinsi/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}master/propinsi";
          } else {
          }
        }
    });
    return false;
})
