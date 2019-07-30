/* Récupère l'id dans l'URL */
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

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
            $(this).find(".count").text(index);
        });
    },
     update: function()
    {
        // On prépare la variable contenant les paramètres
        var order = $(this).sortable("serialize")+'&action=updateListeOrder';
        console.log(order);
        // $(this).sortable("serialize") sera le paramètre "element", un tableau contenant les différents "id"
        // action sera le paramètre qui permet éventuellement par la suite de gérer d'autres scripts de mise à jour
 
        // Ensuite on appelle notre page updateListe.php en lui passant en paramètre la variable order
        $.post("./src/AJAX/drag_list.php",order, {id_tableau : $_GET('id')}, function(theResponse)
        {
        	console.log(theResponse);
            // On affiche dans l'élément portant la classe "reponse" le résultat du script de mise à jour
            $(".reponse").html(theResponse).fadeIn("fast");
            setTimeout(function()
            {
                $(".reponse").fadeOut("slow");
            }, 2000);
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
