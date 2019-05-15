

$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_group_pengguna' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}pengguna/group_akun/simpan/tambah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}pengguna/group_akun";
          } else {
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_group_pengguna' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}pengguna/group_akun/simpan/ubah",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}pengguna/group_akun";
          } else {
          }
        }
    });
    return false;
})
