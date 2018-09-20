<?php include(app_path().'/includes/config.php'); ?>
<html>
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
          <style type="text/css">
           TH {
           border-bottom: 1px solid #000; /* Линия под верхним заголовком */
           }
           
           .vl {
           border-right: 1px solid #000; /* Линия справа */
           }
          </style>
          
    </head>
    
    
    <body>
       <table>
         <?php $i=0;?>
         <?php $y=0;?>
         @foreach ($boxes as $box)
               @if ($box->check==true)
                  @if ($y==0 && $i==0)
                  <th class = "vl"><input name ="checkbox" type="checkbox" 
                                          id='<?php print $box->checkbox_row;?>' 
                                          value = '<?php print $box->checkbox_col;?>' 
                                          checked /></th>
                                          <?php $i++;?>
                  @elseif ($y==0) <th><input name ="checkbox" type="checkbox" 
                                       id='<?php print $box->checkbox_row;?>' 
                                       value = '<?php print $box->checkbox_col;?>' 
                                       checked /></th>
                                       <?php $i++;?>
                  
                  @elseif ($i==0) <td class = "vl"><input name ="checkbox" type="checkbox" 
                                   id='<?php print $box->checkbox_row;?>' 
                                   value = '<?php print $box->checkbox_col;?>' checked /></td>
                                   <?php $i++;?>
                  
                  @else <td><input name ="checkbox" type="checkbox" 
                                   id='<?php print $box->checkbox_row;?>' 
                                   value = '<?php print $box->checkbox_col;?>' checked /></td>
                                   <?php $i++;?>
                  
                  @endif
                   
                    @if($i == $columns)
                    <tr></tr>
                    <?php $i=0; $y=1?>
                    @endif
               @continue  
               @endif
               
               @if ($y==0 && $i==0) <th class = "vl"><input name ="checkbox" type="checkbox" 
                                       id='<?php print $box->checkbox_row;?>' 
                                       value = '<?php print $box->checkbox_col;?>' 
                                       unchecked /></th>
                                       <?php $i++;?>
               @elseif ($y==0) <th><input name ="checkbox" type="checkbox" 
                                       id='<?php print $box->checkbox_row;?>' 
                                       value = '<?php print $box->checkbox_col;?>' 
                                       unchecked /></th>
                                       <?php $i++;?>
               @elseif ($i==0) <td class = "vl"><input name ="checkbox" type="checkbox" 
                                       id='<?php print $box->checkbox_row;?>' 
                                       value = '<?php print $box->checkbox_col;?>' 
                                       unchecked /></th>
                                       <?php $i++;?>
               @else <td><input name ="checkbox" type="checkbox" 
                                       id='<?php print $box->checkbox_row;?>' 
                                       value = '<?php print $box->checkbox_col;?>' 
                                       unchecked /></td>
                                       <?php $i++;?>
               @endif
               @if($i == $columns)
               <tr></tr>
                    <?php $i=0; $y=1?>
               @endif
         @endforeach
      </table>
   </body>
   
</html>
 

<script>
      $(document).ready(function(){
        $('input:checkbox').change(function(){
            var checked = $(this).is(':checked'); 
            
              if ($('[value = '+this.value+']:checked').size()==
                                     $('[value = '+this.value+'][id != 0]').size() && this.id != 0){
                       $('[value='+this.value+'][id = 0]').prop("checked", true);
                          } else if (this.id != 0) {
                       $('[value='+this.value+'][id = 0]').removeAttr("checked");
                }
                
               if ($('[id = '+this.id+']:checked').size()==
                                     $('[id = '+this.id+'][value != 0]').size() && this.value != 0){
                       $('[id='+this.id+'][value = 0]').prop("checked", true);
                          } else if (this.value != 0) {
                       $('[id='+this.id+'][value = 0]').removeAttr("checked");
                }
                
              if (checked && this.id!= 0 && this.value!= 0) {         
                var row = this.id;
                var column = this.value;
                    $.ajax({
                        url: "{{ route('insert') }}",
                        type: 'POST',
                        data: {row : row , column : column }
                        
                    });
               }
               
               else if (this.id != 0  && this.value != 0)  {  
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
    if ($('[value = '+this.value+']:checked').size()==
                                     $('[value = '+this.value+'][id != 0]').size()){
                        //alert($('[value = '+this.value+'][id!=0]).size());
                       $('[value='+this.value+'][id = 0]').prop("checked", true);
                          } else {
                       $('[value='+this.value+'][id = 0]').removeAttr("checked");
                }
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

    

