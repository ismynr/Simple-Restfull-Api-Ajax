<script>

$(document).ready(function () {
    showAll();
    
    $('#v-pills-tab a').on('click', function (e) {
        e.preventDefault()
        switch ($(this).text()) {
            case 'Show All':
                showAll();
                break;
            case 'Create':
                create();
                break;
            case 'Show': 
                show();
                break;
            case 'Update': 
                update();
                break;
            case 'Delete':
                deleted();
            default:
                showAll();
                break;
        }
    });

    function showAll(){
        $.ajax({
            type: "GET",
            url: "{{ url('/api/users') }}",
            dataType: 'json',
            complete: function(data){
                $("#content-index").html("<pre>"+JSON.stringify(data.responseJSON, null, 3)+"</pre>");
            }
        });
    };

    function create(){
        $('#store_button').click(function(e){
            e.preventDefault();
            let formdata = new FormData($('#create_form')[0]);
            $.ajax({
                data : formdata,
                processData: false,
                contentType: false,
                method: "POST",
                dataType: 'json',
                url: "{{ url('/api/users') }}",
                complete: function(data){
                    $("#content-create").html("<pre>"+JSON.stringify(data.responseJSON, null, 3)+"</pre>");
                }
            });
        })
    };

    function show(){
        $('#show_button').click(function(e){
            e.preventDefault();
            var id = $("input[name*='id_show_input']").val();
            $.ajax({
                method: "GET",
                dataType: 'json',
                url: "{{ url('/api/users') }}/"+id,
                complete: function(data){
                    $("#content-show").html("<pre>"+JSON.stringify(data.responseJSON, null, 3)+"</pre>");
                }
            });
        })
    }

    function update(){
        $('#update_button').click(function(e){
            e.preventDefault();
            let formdata = new FormData($('#update_form')[0]);
            formdata.append('_method', 'PUT');
            let id = $("input[name*='id_update_input']").val();
            $.ajax({
                data : formdata,
                processData: false,
                contentType: false,
                method: "POST",
                dataType: 'json',
                url: "{{ url('/api/users') }}/"+id,
                complete: function(data){
                    $("#content-update").html("<pre>"+JSON.stringify(data.responseJSON, null, 3)+"</pre>");
                }
            });
        })
    }

    function deleted(){
        $('#delete_button').click(function(e){
            e.preventDefault();
            var id = $("input[name*='id_delete_input']").val();
            $.ajax({
                method: "DELETE",
                dataType: 'json',
                url: "{{ url('/api/users') }}/"+id,
                data : { 
                    method : '_DELETE', 
                    submit : true
                },
                complete: function(data){
                    $("#content-delete").html("<pre>"+JSON.stringify(data.responseJSON, null, 3)+"</pre>");
                }
            });
        })
    }
})

</script>