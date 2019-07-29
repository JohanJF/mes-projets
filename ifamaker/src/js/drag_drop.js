$('.ma_zone').sortable({
	items : $('.card-liste'),
	connectWith : $('.card-liste'),
	revert : true,
	cursor : "move",
	placeholder : 'bg_PlaceHolder',
	forcePlaceholderSize : true,
	stop: function(event, ui){
        // Pour chaque item de liste
        $('.ma_zone').find(".card-liste").each(function(){
            // On actualise sa position
            index = parseInt($(this).index()+1);
            console.log(index);
            // On la met à jour dans la page
            //$(this).find(".count").text(index);
        });
    }
})

$('.groupe_tache').sortable({
	connectWith : $('.groupe_tache'),
	revert : true,
	cursor : "move",
	placeholder : 'bg-IFA',
	forcePlaceholderSize : true
})
