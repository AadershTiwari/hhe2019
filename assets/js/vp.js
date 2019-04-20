$(document).ready(function(){
	 $(window).on('load',function(){
        $('#myModaladv').modal('show');
    });
	

	$('#btmail').click(function() {
        $('#frmail').attr('action',
                       'mailto:admin@happyhutentertainment.com');
        $('#frmail').submit();
    });
	
    
    var url = $(".video-btn").attr('data-src');
	
	   $("#myModaladv").on('hide.bs.modal', function(){
        $("#advideo").attr('src', '');
    });
    
    
    $("#myModal").on('hide.bs.modal', function(){
        $("#vplay").attr('src', '');
    });
    
    
    $("#myModal").on('show.bs.modal', function(){
        $("#vplay").attr('src', url);
    });
});