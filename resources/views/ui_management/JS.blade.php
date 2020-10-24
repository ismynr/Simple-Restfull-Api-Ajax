<script>

$(function() {
    
    // DATATABLES CONFIG
    let table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                            let btn;
                            btn = '<button type="button" data-id="/api/users/' + data + '" class="editBtn btn btn-info btn-sm mr-1">Edit</button>';
                            btn += '<button data-id="/api/users/' + data + '" class="deleteBtn btn btn-danger btn-sm">Delete</button>';
                            return btn;
                }},
            ]
        });

    // VARIABLE DEFINITION ELEMENT FOR AJAX 
    let Vdef = {
        'error_alert' : { 
            'store' : {
                'name' : $('.error_name'),
                'email' : $('.error_email'),
                'password' : $('.error_password'),
                'password_confirmation' : $('.error_password_confirmation'),
            },
            'edit' : {
                'name' : $('.edit_error_name'),
                'email' : $('.edit_error_email'),
                'password' : $('.edit_error_password'),
                'password_confirmation' : $('.edit_error_password_confirmation'),
            }
        },
        'form' : {
            'store'  : $('#addForm'),
            'edit' : $('#editForm'),
        },
        'edit_column' : {
            'id'        : $('#edit_id'),
            'name'      : $('#edit_name'),
            'email'     : $('#edit_email'),
            'password'  : $('#edit_password'),
            'password_confirmation' : $('#edit_password_confirmation'),
        },
        'url' : "/api/users/"
    };

    // ADD BUTTON TO SHOW MODAL DIALOG
    $('.addBtn').click(function(){
        $('#storeBtn').html('Create');
        $('#addModal').modal('show');
        Vdef.form.store.trigger("reset");
        showHideComp('hide', '', Vdef.error_alert.store);
    });

    // STORE BUTTON TO SAVE DATA 
    $('#storeBtn').click(function (e) {
        e.preventDefault();
        let formdata = new FormData(Vdef.form.store[0]);
        showHideComp('hide', '', Vdef.error_alert.store);
        $(this).html('Sending..');        
        $.ajax({
            data : formdata,
            dataType : 'json',
            processData: false,
            contentType: false,
            url: Vdef.url,
            method: "POST",
            success: function (data) {
                showHideComp('hide', '', Vdef.error_alert.store);
                $('#addModal').modal('hide');
                Vdef.form.store.trigger("reset");
            },
            error: function (data) {
                if(data.status == 422){
                    let msg = data.responseJSON.errors;
                    let msgObject = Object.keys(msg);      
                    // MESSAGE ERROR VALIDATION
                    msgObject.forEach((e, i) => {
                        if (msg[msgObject[i]]) {
                            showHideComp('show', msg[msgObject[i]], { [e] : Vdef.error_alert.store[msgObject[i]] });
                        }
                    });
                }else {
                    alert('Please Reload to read Ajax');
                    console.log("ERROR : ", e);
                }
            },
            complete: function(data) {
                $('#storeBtn').html('Create');
                table.draw();
            }
        });
    });

    // EDIT BUTTON TO SHOW MODAL DIALOG
    $('.table').on('click','.editBtn[data-id]',function(e){
        e.preventDefault();
        Vdef.form.edit.trigger("reset");
        showHideComp('hide', '', Vdef.error_alert.edit);
        let url = $(this).data('id');            
        $.ajax({
            url      : url,
            type     : 'GET',
            datatype : 'json',
            success: function(data){
                let results = data.results;
                let resObject = Object.keys(results);
                let colEditObject = Object.keys(Vdef.edit_column);
                // MATCHING COLUMN DATA FOR FORM
                colEditObject.forEach((e, i) => {
                    // SEARCH
                    resObject.forEach((eResult, iResult) => {
                        if(e == eResult){
                            Vdef.edit_column[e].val(results[eResult]);                            
                        }
                    });
                });
                $('#editModal').modal('show');                
            }
        });
    });

    // UPDATE BUTTON TO SAVE DATA
    $('#updateBtn').click(function(e){
        e.preventDefault();
        let formdata = new FormData(Vdef.form.edit[0]);
        formdata.append('_method', 'PUT');
        showHideComp('hide', '', Vdef.error_alert.edit);
        $(this).html('Sending..');
        $.ajax({
            url        : Vdef.url + $('#edit_id').val(),
            data       : formdata,
            method     :'POST',
            dataType   :'json',
            processData: false,
            contentType: false,
            success: function(data){
                $('#editModal').modal('hide');
                showHideComp('hide', '', Vdef.error_alert.edit);
                Vdef.form.edit.trigger('reset');
            },
            error: function (data) {
                if(data.status == 422){
                    let msg = data.responseJSON.errors;
                    let msgObject = Object.keys(msg);                        
                    // MESSAGE ERROR VALIDATION
                    msgObject.forEach((e, i) => {
                        if (msg[msgObject[i]]) {
                            showHideComp('show', msg[msgObject[i]], { [e] : Vdef.error_alert.edit[msgObject[i]] });
                        }
                    });
                }else {
                    alert('Please Reload to read Ajax');
                    console.log("ERROR : ", e);
                }
                },
            complete: function(){
                $('#updateBtn').html('Ubah');
                table.draw();
            }
        });
    });

    // DELETE OR DESTROY DATA SWEET ALERT
    $('.table').on('click','.deleteBtn[data-id]',function(e){
        e.preventDefault();
        var url = $(this).data('id');  

        if (confirm("Delete Record?") == true) {
            $.ajax({
                url : url,
                type: 'DELETE',
                dataType : 'json',
                data : { 
                    method : '_DELETE', 
                    submit : true
                },
                success: function(data){
                    table.draw();
                },
                error: function (data){
                    alert(data.responseJSON.message);
                }
            });
        } else {
            return false;
        }
    });

    // SHOW HIDE AND SET TEXT IN COMPONENT
    function showHideComp(key, text = "", ...component){
            let comp = component[0];
            let object = Object.keys(comp);
            for (let i = 0; i < object.length; i++) {
                switch (key) {
                    case 'show':
                        comp[object[i]].show();
                        break;
                    case 'hide':
                        comp[object[i]].hide();
                        break;
                    default:
                        break;
                }
                comp[object[i]].text(text);
            }
        };    

})

</script>

