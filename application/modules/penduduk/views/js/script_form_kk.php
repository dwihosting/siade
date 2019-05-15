        $(function() {
          $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                format: 'yyyy/mm/dd',
                startDate: '-30y'
          });
        });
  
        $(".btn-simpan").on("click", function(){
            var dataString = $( 'form#form_penduduk' ).serialize();
            $.ajax({
                type: "POST",
                url: "{SITE_URL}penduduk/home/simpan/tambah",
                data: dataString,
                dataType:"json",
                success: function(msg) {
                  //display message back to user here
                  if (msg.status){
                    window.location.href="{SITE_URL}penduduk/home";
                  } else {
                    //display message back to user here
                                            
                  }
                }
            });
            return false;
        })
	
	// for add new data
	$(".btn-ubah").on("click", function(){
            var dataString = $( 'form#form_penduduk' ).serialize();
            $.ajax({
		type:"POST",
		dataType:"json",
		url:"{SITE_URL}penduduk/home/simpan/update",
		data: dataString,					
		success: function( msg ){
                    //display message back to user here
                    if (msg.status){
                        //window.location.href="{SITE_URL}penduduk/home";
                    } else {
                        //display message back to user here
                                            
                    }
		}
            });
            return false;				
            
	})
