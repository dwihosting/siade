$('.date-picker').datepicker({
        format: 'yyyy/mm/dd',
});


$('.btn-simpan').on('click', function(){
    var dataString = $( 'form#form_surat' ).serialize();
    alert(dataString);
    $.ajax({
        type: "POST",
        url: "{SITE_URL}surat/home/simpan/tambah/{title}",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            //window.location.href="{SITE_URL}surat/home/index/{title}";
          } else {
          
          }
        }
    });
    return false;
})

$(".btn-ubah").on("click", function(){
    var dataString = $( 'form#form_surat' ).serialize();
    $.ajax({
        type: "POST",
        url: "{SITE_URL}surat/home/simpan/ubah/{title}",
        data: dataString,
        dataType:"json",
        success: function(msg) {
          //display message back to user here
          if (msg.status){
            window.location.href="{SITE_URL}surat/home/index/{title}";
          } else {
          }
        }
    });
    return false;
})
