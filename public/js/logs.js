$(document).ready(function(){


$('.deleteBtn').on('click', function(){
	var heroIndex = $.parseJSON($(this).val());
    console.log();
    var id=heroIndex.id;

    $.ajax({
        url: 'logs/delete',
        type: 'GET',
        data: { id: id },
        success: function(response)
        {
            location.reload();
        }
    });

});



});