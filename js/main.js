var getBees = function(){
    $.ajax('ws/get-bees.php', {
        type: 'GET',
        accepts: 'application/json',
        dataType: 'json',
        error: function(jqXHR,textStatus,error){},
        success: function(data, textStatus, jqXHR){
        	var html = "<ul>";

            $.each(data.bees, function(index, bee){
            	html += "<li>"+bee.name+": "+bee.life+"</li>";
            });

            html += "</ul>";

            $("#container").html(html);
        },
        cache: false
    });
};

var kickBee = function(){
    $.ajax('ws/kick.php', {
        type: 'GET',
        accepts: 'application/json',
        dataType: 'json',
        error: function(jqXHR,textStatus,error){},
        success: function(data, textStatus, jqXHR){
        	getBees();

        	if(data.finish)
        	{
        		$("#kick").hide();
        		$("#restart").show();
        	}
        },
        cache: false
    });
};

$(document).ready(function(){

	getBees();

	$(document).on('click', '#kick', function(e){
		e.preventDefault();

		kickBee();
	});

	$(document).on('click', '#restart', function(e){
		e.preventDefault();

		window.location = "index.php?restart=true";
	});
});