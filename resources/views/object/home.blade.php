@extends('app')

@section('panel')
<a href="#" class="load">Загрузка дерева</a>
<a href="#" class="remove">Очистить</a>
@endsection

@section('content')

<div class="staff"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
   /* $(function () {
        $(document).on('click', '.load', function (event) {
            event.preventDefault();
            $.post('/get-employeeTable', function (response) {
                alert(response.toSource());
                if (response.ok) {
                    $('.staff').html(response.view);
                }
                
            });
        });
        

        $(document).on('click', '.remove', function (event) {
            event.preventDefault();
            $('.staff').html('');
        });
    });*/
    
</script>
@endsection


