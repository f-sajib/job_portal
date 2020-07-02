$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td width="10%"><input type="hidden"name="user_id[]" class="form-control" value="<?php echo $user_id;?>"><input id="degree" name="degree[]" class="form-control" placeholder="degree"></td><td width="10%"><input id="year" name="year[]" class="form-control" placeholder="year"></td><td width="30%"><input id="board" name="board[]" class="form-control" placeholder="board/city"></td><td width="40%"><input id="institute" name="institute[]" class="form-control" placeholder="institute"></td><td width="10%"><input id="result" name="result[]" class="form-control" placeholder="result"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
    
});