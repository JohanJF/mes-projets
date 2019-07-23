
if ($('.alerte').html() == 0) 
{
	$('.alerte').hide();
}

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

	$(input).attr("value","").attr("placeholder","Nouveau mot de passe").removeAttr('required');

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

    	e.preventDefault();

    	

        $.post(
            'src/AJAX/add_list.php', 
            {
                success : $("#titre_table").val(),
                id : $_GET('id')
            },
 
            function(data){
            	console.log(data);
            	if (data == "Success") 
            	{
					window.location.reload();
            	}
         
            },
         );
     });

});	

/* Efface un tableau */
$('.btn_board').on('click', delete_board);

function delete_board()
{
	$.post(
        'src/AJAX/delete_board.php', 
        { 
            id_board : $(this).attr('id')
        },

        function(data){
        	console.log(data);
        	if (data == "Success") 
        	{
				document.location.href="http://localhost/mes-projets/ifamaker/index.php";
        	}
        },
        'text'
     );
}

/* Insère la tâche dans la BDD */
$('.button_creer_tache').on('click', creer_tache);

function creer_tache()
{
	$.post(
        'src/AJAX/add_task.php', 
        {
            task : $(this).parent().prev().val(),  
            id_list : $(this).parents('.ma_listeid').attr('id')
        },

        function(data){
        	console.log(data);
        	if (data == "Success") 
        	{
				window.location.reload();
        	}
        	
        },
     );
}

/* récupère les informations d'un tableau collaboratif dans une fenètre modale */
$('.modifier_tab').on('click', open_modal_viewPerso);

function open_modal_viewPerso()
{
	let title_modal = $(this).parent().parent().children().find('h5').text();
	let id_tableau_modal = $(this).parent().parent().children().find('h5').attr('id');
		id_tableau_modal = id_tableau_modal.split('-');

	$.post(
        'src/AJAX/administration.php', 
        {  
            id_tableau : id_tableau_modal[1],
            user : $_GET('user')
        },

        function(data)
        {
        	console.log(data);

        	let firstname = data['firstname'];
        	let administrateur = data['admin'][0];
        	console.log(data['admin']['firstname'])
        	let user_actif = data['user'][0];
			
        	let tr_admin = document.createElement('tr');
			let th_admin = document.createElement('th');
			let tr_user_actif = document.createElement('tr');
			let th_user_actif = document.createElement('th');
				th_user_actif.className = 'text-success';

			$('#modal_body_viewPerso').parent().append(tr_admin,tr_user_actif);
			tr_admin.append(th_admin);
			tr_user_actif.append(th_user_actif);
			th_admin.append('Admin : ',administrateur);
			th_user_actif.append(user_actif);

        	for(var collaborateur in firstname)
			{
				let tr = document.createElement('tr');
				let td = document.createElement('td');
				var span = document.createElement('span');
					span.className = 'close delete_collab_'+firstname[collaborateur];
					span.setAttribute('alt','Supprimer le collaborateur');
					span.setAttribute('title','Supprimer le collaborateur');
				
				let text = document.createTextNode('x');
				tr.append(td);
				span.append(text);
				td.append(collaborateur,span);
			  	$('#modal_body_viewPerso').append(tr);
			}
			$('.close').on('click', delete_collab);

			if (data['admin'][1] != data['user'][1]) 
			{
				$('.modifier_titre_tab').hide();
				$('.close').hide();
			}
        },
        'json'
        
     );
	$('.modal_titre_viewPerso').attr('id','titre_tab_'+id_tableau_modal[1]);
	$('.modal_titre_viewPerso').text(title_modal);
	$('#modal_viewPerso').modal('show');
}

function delete_collab()
{
	console.log(this);
	let id_collab = $(this).attr('class').split('_');
	let id_tableau = $(this).parents().find('#modal_viewPerso').children().find('.modal_titre_viewPerso').attr('id').split('_');
	console.log(id_collab[2]);
	console.log(id_tableau[2]);
	$.post(
		        'src/AJAX/delete_collab.php', 
		        {
		            id_collab : id_collab[2],
		            id_board : id_tableau[2]
		        },

		        function(data){
		        	console.log(data);
		        	if (data == "Success") 
		        	{
						document.location.href="http://localhost/mes-projets/ifamaker/index.php";
		        	}
		        	else
		        	{
		        		$('#test').html('Erreur ajout tâche');
		        	}
		        },
		        'text'
	     	);
}

/* vide le modal du tableau */
$('#modal_viewPerso').on('hidden.bs.modal', function (e) {
  $('#modal_viewPerso').find('tr').html("");
})

/* Permet de modifier le titre d'un tableau collaboratif */

$('.modifier_titre_tab').on('click', update_tableau);

function update_tableau()
{
	$(this).attr('disabled','true');
	let id_tableau = $('.modal_titre_viewPerso').attr('id');
	let id = id_tableau.split('_');
	let titre_tableau = $('.modal_titre_viewPerso').text();
	$(this).parents().find('.modal_titre_viewPerso').html('<div class="input-group input-group-sm"><input id="modif_tableau_'+id[2]+'" type="text" placeholder="Modifier titre tableau" class="form-control modif_titre_tab" /><div class="input-group-append"><button type="button" class="btn btn-outline-grey button_creer_tache submit_modif_tableau">Modifier</button></div></div>');
	$('.modif_titre_tab').val(titre_tableau);
	$('.submit_modif_tableau').on('click',modif_tableau);
}

function modif_tableau()
{
	let id_tableau = $('.modif_titre_tab').attr('id');
	let id = id_tableau.split('_');
	console.log(id);
	console.log($(this).parents().find('.titre_tache_modal').attr('id'));
			$.post(
		        'src/AJAX/update_tableau.php', 
		        {
		            id_table : id[2],
		            table_title : $('.modif_titre_tab').val()
		        },

		        function(data){
		        	console.log(data);
		        	if (data == "Success") 
		        	{
						document.location.href="http://localhost/mes-projets/ifamaker/index.php";
		        	}
		        	else
		        	{
		        		$('#test').html('Erreur ajout tâche');
		        	}
		        },
		        'text'
	     	);

			/*$(this).parents().find('.titre_tache_modal').removeAttr("disabled");
	 		let titre_modif = $('.modif_tache').val();
	 		$(this).parents().find('.titre_tache_modal').html('<h3 class="modal-title text-dark titre_tache_modal">'+titre_modif+'</h3>');*/

}

//////////////////////////////////////////////////////////////////
/* Modifie le titre d'un tableau personnel */

$('.modifier_titre_tab_Perso').on('click', update_tableau_perso);

function update_tableau_perso()
{
	$(this).attr('disabled','true');
	let titre_tableau_perso = $(this).parent().parent().children().find('h5').text();
	let id_tableau_perso = $(this).parent().parent().children().find('h5').attr('id');
	let	id = id_tableau_perso.split('-');
	$(this).parent().parent().children().find('h5').html('<div class="input-group input-group-sm"><input id="modif_tableau_'+id[1]+'" type="text" placeholder="Modifier titre tableau" class="form-control modif_titre_tab" /><div class="input-group-append"><button type="button" class="btn btn-outline-grey button_creer_tache submit_modif_tableau_perso">Modifier</button></div></div>');
	$('.modif_titre_tab').val(titre_tableau_perso);
	$('.submit_modif_tableau_perso').on('click',modif_tableau_perso);
}

function modif_tableau_perso()
{
	let id_tableau = $(this).parent().parent().find('input').attr('id');
	let id = id_tableau.split('_');
			$.post(
		        'src/AJAX/update_tableau.php', 
		        {
		            id_table : id[2],
		            table_title : $(this).parent().parent().find('input').val()
		        },

		        function(data){
		        	console.log(data);
		        	if (data == "Success") 
		        	{
						document.location.href="http://localhost/mes-projets/ifamaker/index.php";
		        	}
		        	else
		        	{
		        		$('#test').html('Erreur ajout tâche');
		        	}
		        },
		        'text'
	     	);

			/*$(this).parents().find('.titre_tache_modal').removeAttr("disabled");
	 		let titre_modif = $('.modif_tache').val();
	 		$(this).parents().find('.titre_tache_modal').html('<h3 class="modal-title text-dark titre_tache_modal">'+titre_modif+'</h3>');*/

}



/* Récupère les informations d'une tâche dans une fenêtre modale */

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
        'src/AJAX/delete_list.php', 
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
		        'src/AJAX/update_list.php', 
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
        'src/AJAX/delete_task.php', 
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
		        'src/AJAX/update_task.php', 
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

/* Pop-up de l'icone collaboration */

$(document).ready(function(){

  $('.pop1').popover({
  	html : true,
  	content : '<div class="input-group input-group-sm"><input type="email" class="form-control" id="mail_collab" placeholder="Entrez mail collaborateur"><div class="input-group-append"><button type="button" class="btn" id="btn_pop1">valider</button></div></div><span id="msg_ajout_collab"></span>',
  });
});

$(".pop1").on('shown.bs.popover', function(){

 	// Envoie un mail pour rejoindre le tableau collaboratif

	$('#btn_pop1').on('click', ajouter_collab);

	function ajouter_collab()
	{

		$.post(
	        'src/AJAX/add_collab.php', 
	        {
	            mail_collab : $('#mail_collab').val(),
	            title_board : $('.badge-light').html(),
	            id_board : $_GET('id')
	        },

	        function(data){
	        	console.log(data);
	        	if (data == "Success") 
	        	{
	        		$('#mail_collab').val('');
					$('#msg_ajout_collab').attr('class','text-success').text('Invitation envoyée !');
	        	}
	        	else
	        	{
	        		$('#msg_ajout_collab').attr('class','text-danger').text('Entrez un email valide !');
	        	}
	        },
	        'text'
	 	);
	}

});

$(document).ready(function(){

  $('.pop2').popover(
	{
	  	html : true,
	  	content : function() {
	          var elementId = $(this).attr("data-popover-content");
	          return $(elementId).html();
	    }
	});
});


// changement background hover notifications
$(".pop2").on('shown.bs.popover', function(){

	$.post(
	        'src/AJAX/consulted.php',
	        {
	        	user_actif : user_actif
	        }
	 	);

	$('.table-striped').children().find('tr').hover(function() {

    $(this).addClass("bg bg-secondary");
  }, function() {
    $(this).removeClass("bg bg-secondary");
  }
  	);

});


