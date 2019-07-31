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


/* UPDATE BDD Drag & Drop */

$('.ma_zone').sortable({
	items : $('.card-liste'),
	connectWith : $('.card-liste'),
	revert : true,
	cursor : "move",
	placeholder : 'bg_PlaceHolder',
	forcePlaceholderSize : true,
	start: function(event, ui) {
        // Create a temporary attribute on the element with the old index
        $(this).attr('data-currentindex', ui.item.index()); // implémente dans un attribut la position de liste
    },
    update: function(event, ui) {
        let id = ui.item.attr('id'); // id de la liste 
        let current_position = parseInt($(this).attr('data-currentindex'))+1; // position actuelle de la liste 
        let desired_position = ui.item.index()+1; // position d'arrivé de la liste
        console.log('id item : ' + id);
        console.log('position desirée : ' + desired_position);
        console.log('position actuelle : ' + current_position);

        /*// Reset the current index
        $(this).removeAttr('data-currentindex');

        // Post to the server to handle the changes
        $.ajax({
            type: "POST",
            url: "./src/AJAX/drag_list.php",
            data: {
                desired_position: desired_position,
                current_position: current_position,
                id: id
            },
            beforeSend: function() {
                // Disable dragging
                $('.ma_zone').sortable('disable');
            },
            success: function(html) {
                // Re-enable dragging
                $('.ma_zone').sortable('enable');
                console.log(html);
            }
        });*/
    }
})

$('.groupe_tache').sortable({
	connectWith : $('.groupe_tache'),
	revert : true,
	cursor : "move",
	placeholder : 'bg-IFA',
	forcePlaceholderSize : true,
	start: function(event, ui) {
        // Create a temporary attribute on the element with the old index
        let id_liste_depart = ui.item.parent().attr('id'); 
        	id_liste_depart = id_liste_depart.split('-'); // transforme l'id de la liste de départ en tableau
        $(this).attr('data-currentindexParent',id_liste_depart[1]); // implémente dans un attribut l'id de la liste
        $(this).attr('data-currentindex', ui.item.index()); // implémente dans un attribut la position de la tache
    },
    stop: function(event, ui) {
        let id_task = ui.item.attr('id'); 
         	id_task = id_task.split('-'); // transforme l'id de la tache en tableau
        let id_liste = ui.item.parent().attr('id'); 
        	id_liste = id_liste.split('-'); // transforme l'id de la liste en tableau
        let current_position = $(this).attr('data-currentindex'); // position actuelle de la tache
        let desired_position = ui.item.index(); // position d'arrivé de la tache

        console.log($(this).attr('data-currentindexParent'));
        console.log('id_tableau final : ' + id_liste[1]);
        console.log('id item : ' + id_task[1]);
        console.log('position desirée : ' + desired_position);
        console.log('position actuelle : ' + current_position);

       /* // Reset the current index
        $(this).removeAttr('data-currentindex');

        // Post to the server to handle the changes
        $.ajax({
            type: "POST",
            url: "./src/AJAX/drag_list.php",
            data: {
                desired_position: desired_position,
                current_position: current_position,
                id: id
            },
            beforeSend: function() {
                // Disable dragging
                $('.ma_zone').sortable('disable');
            },
            success: function(html) {
                // Re-enable dragging
                $('.ma_zone').sortable('enable');
                console.log(html);
            }
        });*/
    }
})



