            

            // begin first table
            $('#akun_tables').dataTable({
                "sDom" : "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", //default layout without horizontal scroll(remove this setting to enable horizontal scroll for the table)
                "aLengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"] // change per page values here
                ],
                "bProcessing": true,
                "bServerSide": true,                
                "sAjaxSource": "{SITE_URL}pengguna/akun/list_table",
                 "sServerMethod": "POST",
                // set the initial value
                "iDisplayLength": 10,
                "sPaginationType": "bootstrap_full_number",
                "oLanguage": {
                    "sProcessing": '<i class="fa fa-coffee"></i>&nbsp;Please wait...',
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [
                    {'sWidth': '5%', 'bSortable': false,'aTargets': [0]},
                    {'sWidth': '10%', 'bSortable': false,'aTargets': [1]},
                    {'sWidth': '30%', 'bSortable': false,'aTargets': [2]},
                    {'sWidth': '15%', 'bSortable': false,'aTargets': [3]},
                    {'sWidth': '10%', 'bSortable': false,'aTargets': [4]},
                    {'sWidth': '10%', 'bSortable': false,'aTargets': [5]},
                    {'sWidth': '10%', 'bSortable': false,'aTargets': [6]},
                    {'sWidth': '15%', 'bSortable': false,'aTargets': [7]},
                ]
            });

            jQuery('#akun_tables .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
            jQuery('#akun_tables .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown

            $('#tambah_record_btn').on("click", function(){
               window.location.href="{LINK_ADD_NEW}";
            })
            
            // handle record edit/remove
            $('body').on('click', '#akun_tables .btn-editable', function() {
                window.location.href="{LINK_ADD_NEW}/" + $(this).attr("data-id");
            });

            $('body').on('click', '#akun_tables .btn-removable', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    url: "{SITE_URL}pengguna/akun/hapus",
                    data: {id:id},
                    success: function() {
                      //display message back to user here
                    }
                });
            });
