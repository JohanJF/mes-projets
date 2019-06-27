
/* Crée un élément "input texte" afin de modifier les informations personnelles de l'user */

var display = false;
var btn_clicked = true;

function modifier_info()
{
	btn_clicked = !btn_clicked;
	nb = $('td');

	for (var i = 0; i < nb.length; i++)
	{
		
		id = 'user_'+ (i+1);
		var div_base = document.getElementsByTagName('td')[i].getElementsByTagName('div')[0];

		if (typeof div_base != "undefined") 
		{
			if (div_base.parentNode) 
			{
				div_base.parentNode.removeChild(div_base); // évite les multiplications de l'élément "input"
			}
			$('.btn-danger').show();
		} 
		else 
		{
			console.log(nb[i].innerHTML);


			var div = document.createElement('div');
				$(div).addClass("input-group input-group-sm").css('display','true');

			var input = document.createElement('input');
				$(input).addClass("form-control").attr("type","text").attr("value",nb[i].innerHTML).attr("name","modifier_info_user"+i).attr("required","true");

			div.append(input);

			nb[i].append(div);

		}

	}

	//$(input).attr("value",nb[nb.length-1].innerHTML);

	if (!btn_clicked) 
	{
		$('.btn-danger').hide();
		$('.btn-success').show();
	}
	else
	{
		$('.btn-danger').show();
		$('.btn-success').hide();
	}

}



// REQUÊTE AJAX

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

/* Ajouter list dans BDD */
$(document).ready(function(){

 	$("#zone").on("click", "#add_list", function(e){
 		//$(".add_table").click(function(e){

    	e.preventDefault();

    	

        $.post(
            'src/AJAX/add_list.php', // Un script PHP que l'on va créer juste après
            {
                success : $("#titre_table").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                id : $_GET('id')
            },
 
            function(data){
            	console.log(data);
            	if (data == "Success") 
            	{
					window.location.reload();
            	}
            	else
            	{
            		$('#test').html('Erreur ajout liste');
            	}
                
         
            },
            'text'
         );
     });

});	

/* Insère la tâche dans la BDD */
$('.button_creer_tache').on('click', creer_tache);

function creer_tache()
{
	$.post(
        'src/AJAX/add_task.php', // Un script PHP que l'on va créer juste après
        {
            task : $(this).parent().prev().val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            id_list : $(this).parents('.ma_listeid').attr('id')
        },

        function(data){
        	console.log(data);
        	if (data == "Success") 
        	{
				window.location.reload();
        	}
        	else
        	{
        		$('#test').html('Erreur ajout tâche');
        	}
        },
        'text'
     );
}

/* Récupère les informations dans une fenêtre modale */

$('.tache').on('click', open_modal);

function open_modal()
{
	console.log($(this).attr('id'));
	let id_tache_modal = $(this).attr('id');
	id_tache_modal = id_tache_modal.split('-');
	console.log(id_tache_modal[1]);
	title_modal = $(this).children('li').find('h6').text();
	title_liste_modal = $(this).parents('.card-body').find('.titre_liste_ref').text();
	$('.titre_tache_modal').text(title_modal);
	$('.titre_liste_modal').text(title_liste_modal);
	$('.titre_tache_modal').attr('id',id_tache_modal[1]);
	$('#ma_tache').modal('show');
}

/* Permet la suppression d'une tâche */

$('.btn-supprimer').on('click', supprimer_liste);

function supprimer_liste()
{
	console.log($(this).parents('.ma_listeid').attr('id'));
	$.post(
        'src/AJAX/delete_list.php', // Un script PHP que l'on va créer juste après
        {
            id_list : $(this).parents('.ma_listeid').attr('id')
        },

        function(data){
        	console.log(data);
        	if (data == "Success") 
        	{
				window.location.reload();
        	}
        	else
        	{
        		$('#test').html('Erreur ajout tâche');
        	}
        },
        'text'
     );
}

/* Permet de modifier le titre de la liste */

$('.btn-modifier').on('click', modifier_liste);

function modifier_liste()
{
	$(this).attr('disabled','true');
	console.log($(this).parents('.card-body').find('.titre_liste_ref'));
	let titre_list = $(this).parents('.card-body').find('.titre_liste_ref').text();
	let id_list = $(this).parents('.ma_listeid').attr('id');
	$(this).parents('.card-body').find('.titre_liste_ref').html('<div class="input-group input-group-sm"><input type="text" placeholder="Modifier titre liste" class="form-control modif_titre" /><div class="input-group-append"><button type="button" class="btn btn-outline-grey button_creer_tache submit_modif_titre">Modifier</button></div></div>');
	$('.modif_titre').val(titre_list);	
	$('.submit_modif_titre').on('click',modif);
	
}



function modif()
{
			$.post(
		        'src/AJAX/update_list.php', // Un script PHP que l'on va créer juste après
		        {
		            id_list : $(this).parents('.ma_listeid').attr('id'),
		            titre_liste : $('.modif_titre').val()
		        },

		        function(data){
		        	console.log(data);
		        	if (data == "Success") 
		        	{
						window.location.reload();
		        	}
		        	else
		        	{
		        		$('#test').html('Erreur ajout tâche');
		        	}
		        },
		        'text'
	     	);

			$(this).parents('.card-body').find('.btn-modifier').removeAttr("disabled");
	 		let titre_modif = $('.modif_titre').val();
	 		$(this).parents('.card-body').find('.titre_liste_ref').html("<h5 class='card-title text-white'><span class='titre_liste_ref' id='titre-<?=$value[0]?>'>"+titre_modif+"</span></h5>");

}

/* Permet de supprimer une tache */

$('.delete_task').on('click', delete_task);

function delete_task()
{
	console.log($(this).parents().find('.titre_tache_modal').attr('id'));
	$.post(
        'src/AJAX/delete_task.php', // Un script PHP que l'on va créer juste après
        {
            id_task : $(this).parents().find('.titre_tache_modal').attr('id')
        },

        function(data){
        	console.log(data);
        	if (data == "Success") 
        	{
				window.location.reload();
        	}
        	else
        	{
        		$('#test').html('Erreur ajout tâche');
        	}
        },
        'text'
     );
	
}

/* Permet de modifier une tache */

$('.modifier_tache').on('click', update_task);

function update_task()
{
	$(this).attr('disabled','true');
	let id_task = $(this).parents().find('.titre_tache_modal').attr('id');
	let titre_task = $(this).parents().find('.titre_tache_modal').text();
	$(this).parents().find('.titre_tache_modal').html('<div class="input-group input-group-sm"><input id="modif_task_'+id_task+'" type="text" placeholder="Modifier titre tache" class="form-control modif_tache" /><div class="input-group-append"><button type="button" class="btn btn-outline-grey button_creer_tache submit_modif_tache">Modifier</button></div></div>');
	$('.modif_tache').val(titre_task);
	$('.submit_modif_tache').on('click',modif_task);
}

function modif_task()
{
	console.log($(this).parents().find('.titre_tache_modal').attr('id'));
			$.post(
		        'src/AJAX/update_task.php', // Un script PHP que l'on va créer juste après
		        {
		            id_task : $(this).parents().find('.titre_tache_modal').attr('id'),
		            task_title : $('.modif_tache').val()
		        },

		        function(data){
		        	console.log(data);
		        	if (data == "Success") 
		        	{
						window.location.reload();
		        	}
		        	else
		        	{
		        		$('#test').html('Erreur ajout tâche');
		        	}
		        },
		        'text'
	     	);

			$(this).parents().find('.titre_tache_modal').removeAttr("disabled");
	 		let titre_modif = $('.modif_tache').val();
	 		$(this).parents().find('.titre_tache_modal').html('<h3 class="modal-title text-dark titre_tache_modal">'+titre_modif+'</h3>');

}

/*$(document).ready(function(){

  $('.pop1').popover({
  	html : true,
  	content : '<div class="input-group input-group-sm"><input type="text" class="form-control" placeholder="Entrez mail collaborateur"><div class="input-group-append"><button type="button" class="btn" id="btn_pop1">valider</button></div></div>'
  
  });
});

$(document).ready(function(){

  $('.pop2').popover({
  	html : true,
  	content : '<p>Notif 1</p>'
  });
});

buton_ajout_collab = $('script').('#btn_pop1');
console.log(buton_ajout_collab);
buton_ajout_collab.on('click', ajouter_collab);

function ajouter_collab()
{
	console.log(1);

}*/