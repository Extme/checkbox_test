


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

            $(document).ready(function () {
              
                   $('#level0 tbody').on('click', 'tr', function () {
                       var table = $('#level0').DataTable();
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

