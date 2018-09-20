<?php include(app_path().'/includes/config.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 


 <?php $i=0;?>
 @foreach ($boxes as $box)
      @if ($box->check==true) 
        <input name ="checkbox" type="checkbox" id='<?php print $box->checkbox_row;?>' value = '<?php print $box->checkbox_col;?>' checked />   
      @else <input name ="checkbox" type="checkbox" id='<?php print $box->checkbox_row;?>' value = '<?php print $box->checkbox_col;?>' unchecked />
      @endif
    <?php $i++;?>
    @if($i == $columns)
         </br>
         <?php $i=0;?>
    @endif
 @endforeach
 
 
 

<script>
      $(document).ready(function(){
        $('input:checkbox').change(function(){
            var checked = $(this).is(':checked');     
              if(checked && this.id!= 0 && this.value!= 0) {         
                var row = this.id;
                var column = this.value;
                    $.ajax({
                        url: "{{ route('insert') }}",
                        type: 'POST',
                        data: {row : row , column : column }
                        
                    });
               }
               
               else if (this.id!=0  && this.value!=0)  {  
                     var row = this.id;
                     var column = this.value;
                     $.ajax({
                         url: "{{ route('delete') }}",
                         type: 'POST',
                         data: {row : row , column : column }
                         
                    
                    });
                }      
        });
    });
    
    $(document).ready(function(){
        $('[id = 0][value = 0]').change(function(){
              var checked = this.checked;
                if(checked){
                    $('[name = "checkbox"]').prop('checked', true);
                    $.ajax({
                         url: "{{ route('selectAll') }}",
                         type: 'POST',
                         data: {}
                         
                     });
                    
                    return false;
                }
                
                else {
                      $('[name = "checkbox"]').prop('checked', false);
                      $.ajax({
                         url: "{{ route('deSelectAll') }}",
                         type: 'POST',
                         data: {}
                         
                     });
                }  
                
        });
    });
    
    $(document).ready(function(){
        $('[id = 0][value!=0]').change(function(){
                var checked = this.checked;
                if(checked){
                    $('[value = '+this.value+']').prop('checked', true);
                    var column = this.value;
                     $.ajax({
                         url: "{{ route('selectColumn') }}",
                         type: 'POST',
                         data: {column : column }
                         
                     });
                     return false;                  
                }
                else {
                    $('[value = '+this.value+']').prop('checked', false);
                    var column = this.value;
                    $.ajax({
                         url: "{{ route('deSelectColumn') }}",
                         type: 'POST',
                         data: {column : column }
                         
                     });
                }
        });
    });
    
    $(document).ready(function(){
        $('[value = 0][id!=0]').change(function(){
                var checked = this.checked;
                if(checked){
                    $('[id = '+this.id+']').prop('checked', true);
                    var row = this.id;
                     $.ajax({
                         url: "{{ route('selectRow') }}",
                         type: 'POST',
                         data: {row : row }
                         
                     });
                     return false;
                }
                else {
                    $('[id = '+this.id+']').prop('checked', false);
                    var row = this.id;
                    $.ajax({
                         url: "{{ route('deSelectRow') }}",
                         type: 'POST',
                         data: {row : row }
                         
                     });
                }
        });
    });       
</script>

    

