@extends('app')

@section('content')
  
        <div class="container">
            <br />
            <table id="level0" class="cell-border" style="width:90%" align = "left">
                <thead>
                <h1>Глава компании</h1>
                    <tr>
                        <th align="top">ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Дата приема</th>
                        <th>Заработная плата</th>
                      
                    </tr>
                </thead>
            </table>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function () {
                
            $('#level0').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('getHead') }}",
                    "columns": [
                          {"data": "id"},
                          {"data": "fio"},
                          {"data": "position"},
                          {"data": "employment_date"},
                          {"data": "salary"}
                    ] 
                }); 
               
            });
        </script>
        
         <div class="container">
            <br />
            <table id="level1" class="cell-border" style="width:90%" align = "left">
                <thead>
                    <h2>Региональные управляющие</h2>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Дата приема</th>
                        <th>Заработная плата</th>
                      
                    </tr>
                    <tbody></tbody>
                </thead>
            </table>
        </div> 
        
        
         <script type="text/javascript">
             
           $(document).ready(function () {
               var table = $('#level0').DataTable();
                   $('#level0 tbody').on('click', 'tr', function () {
                         
                       var data = table.row( this ).data();
                       var id = data['id'];
                       var position = data['position'];
                           $.ajax({
                           url:"{{ route('showSubordinates') }}",
                           method:"POST",
                           async: false,
                           data: {id : id , position : position},
                           success:function(data){
                               $('#level1').DataTable({
                               "destroy": true,
                                data: data['data'],
                               "columns": [
                                    {"data": "id"},
                                    {"data": "fio"},
                                    {"data": "position"},
                                    {"data": "employment_date"},
                                    {"data": "salary"}
                                ] 
                            });      
                          }
                     });
                });
            }); 
        
        </script>
        
        <div class="container">
            <br />
            <table id="level2" class="cell-border" style="width:90%" align = "left">
                <thead>
                    <h2>Директора филиалов</h2>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Дата приема</th>
                        <th>Заработная плата</th>
                       
                    </tr>
                     <tbody></tbody>
                </thead>
            </table>
        </div>
        
        <script type="text/javascript">
       
        $(document).ready(function() {              
                   $('#level1 tbody').on('click', 'tr', function () {
                       var table = $('#level1').DataTable();
                       var data = table.row( this ).data();
                       var id = data['id'];
                       var position = data['position'];
                           $.ajax({
                           url:"{{ route('showSubordinates') }}",
                           method:"POST",
                          
                           data: {id:id, position:position},
                           success:function(data){
                               $('#level2').DataTable({
                               "destroy": true,
                                data: data['data'],
                               "columns": [
                                    {"data": "id"},
                                    {"data": "fio"},
                                    {"data": "position"},
                                    {"data": "employment_date"},
                                    {"data": "salary"}
                                ] 
                               });      
                          }
                          });
                    });
          });    
        </script>
        
        <div class="container">
            <br />
            <table id="level3" class="cell-border" style="width:90%" align = "left">
                <thead>
                    <h2>Начальники отделений</h2>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Дата приема</th>
                        <th>Заработная плата</th>
                       
                    </tr>
                    <tbody></tbody>
                </thead>
            </table>
         </div>
        
        <script type="text/javascript">           
           $(document).ready(function() {              
                   $('#level2 tbody').on('click', 'tr', function () {                     
                       var table = $('#level2').DataTable();
                       var data = table.row( this ).data();
                       var id = data['id'];
                       var position = data['position'];
                           $.ajax({
                           url:"{{ route('showSubordinates') }}",
                           method:"POST",
                           data: {id:id, position:position},
                           success:function(data){
                               $('#level3').DataTable({
                               "destroy": true,
                                data: data['data'],
                               "columns": [
                                    {"data": "id"},
                                    {"data": "fio"},
                                    {"data": "position"},
                                    {"data": "employment_date"},
                                    {"data": "salary"}
                                ] 
                               });      
                          }
                          });
                    });
          }); 
         </script> 
         
          <div class="container">
            <br />
            <table id="level4" class="cell-border" style="width:90%" align = "left">
                <thead>
                    <h2>Персонал отделений</h2>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Дата приема</th>
                        <th>Заработная плата</th>
                       
                    </tr>
                    <tbody></tbody>
                </thead>
            </table>
         </div>
         
         <script type="text/javascript">
            
           $(document).ready(function() {              
                   $('#level3 tbody').on('click', 'tr', function () {
                       var table = $('#level3').DataTable();
                       var data = table.row( this ).data();
                       var id = data['id'];
                       var position = data['position'];
                           $.ajax({
                           url:"{{ route('showSubordinates') }}",
                           method:"POST",
                           data: {id:id, position:position},
                           success:function(data){
                               $('#level4').DataTable({
                               "destroy": true,
                                data: data['data'],
                               "columns": [
                                    {"data": "id"},
                                    {"data": "fio"},
                                    {"data": "position"},
                                    {"data": "employment_date"},
                                    {"data": "salary"}
                                ] 
                               });      
                          }
                          });
                    });
           });    
        </script>
    
</html>
@endsection