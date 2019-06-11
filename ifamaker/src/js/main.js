/* déclaration de l'id unique de ma table */

var id_table = 0; // id unique pour chaque table
var updated = false; // variable servant à la modification du titre de la table

function creer_table()
{

	//----------------------    ETAPE 1    -----------------------------------------------

	/* création de mes noeuds constituant une table */

	var mon_article = document.createElement("article");
		$(mon_article).addClass("col my-3").attr("draggable","true");
		mon_article.id = id_table; // incrémentation de l'id unique de ma table*/


	var ma_section = document.createElement("section");
		$(ma_section).addClass("card bg-grey-darkskin border border-IFA").css("width","16rem");


	var div_carte_body = document.createElement("div");
		$(div_carte_body).addClass("card-body");


	var titre_carte = document.createElement("h5");
		$(titre_carte).addClass("card-title text-white");

	var span_titre_carte = document.createElement("span");
		span_titre_carte.id = 'titre-' + id_table; // id unique du titre de la table


	var texte_carte = document.createElement("div");
		$(texte_carte).addClass("card-text my-2");

	var liste_carte = document.createElement("ul");
		$(liste_carte).addClass("list-group");
		liste_carte.id = "ma_liste-" + mon_article.id; // id unique de la liste


	var liste_input_carte = document.createElement("li");
		$(liste_input_carte).addClass("list-group-item border border-dark");
		liste_input_carte.id = 'li-'+id_table; // id unique du li qui contient balise input (titre , cf : fonction supprimer_input)


	var div_input_carte = document.createElement("div");
		$(div_input_carte).addClass("input-group input-group-sm");

	var input_carte = document.createElement("input");
		input_carte.id = 'titre_tache-' + id_table;
		$(input_carte).attr("type","text").addClass("form-control").attr("placeholder","Ajouter tâche").attr("onkeypress",'if (event.keyCode == 13) creer_tache("'+liste_carte.id+'","'+input_carte.id+'","'+liste_input_carte.id+'","'+span_titre_carte.id+'")');
		


	var div_bouton_carte = document.createElement("div");
		$(div_bouton_carte).addClass("input-group-append");


	var bouton_carte_creer = document.createElement("button");
		$(bouton_carte_creer).addClass("btn btn-outline-secondary").attr("type","button").attr("onclick","creer_tache('"+liste_carte.id+"','"+input_carte.id+"','"+liste_input_carte.id+"','"+span_titre_carte.id+"')");

		console.log(liste_carte.id);


	var bouton_carte_modifier = document.createElement("button");
		$(bouton_carte_modifier).addClass("btn btn-modifier card-link").attr("href","#").attr("onclick","modifier_table('"+span_titre_carte.id+"',"+mon_article.id+")");
		console.log(span_titre_carte.id);


	var bouton_carte_supprimer = document.createElement("button");
		$(bouton_carte_supprimer).addClass("btn btn-supprimer card-link").attr("href","#").attr("onclick","supprimer_table("+mon_article.id+")");


		/* on imbrique le tout */

		mon_article.append(ma_section);
		ma_section.append(div_carte_body);
		div_carte_body.append(titre_carte);
		titre_carte.append(span_titre_carte);
		span_titre_carte.append($("#titre_table").val());
		div_carte_body.append(texte_carte);
		texte_carte.append(liste_carte);
		liste_carte.append(liste_input_carte);
		liste_input_carte.append(div_input_carte);
		div_input_carte.append(input_carte);
		div_input_carte.append(div_bouton_carte);
		div_bouton_carte.append(bouton_carte_creer);
		bouton_carte_creer.append("Créer");
		div_carte_body.append(bouton_carte_modifier);
		bouton_carte_modifier.append("Modifier");
		div_carte_body.append(bouton_carte_supprimer);
		bouton_carte_supprimer.append("Supprimer");

		/* on ajoute le contenu entier dans la div "ma_base" */
		$("#ma_base").append(mon_article);


		//----------------------    ETAPE 2    -----------------------------------------------


		/* On supprime la table qui nou permet de créer une nouvelle table */

		supprimer_table('nouvelle_table');  


		//----------------------    ETAPE 3    -----------------------------------------------


		/* on crée à la suite une nouvelle table permettant la creation d'une table */

		var mon_article_creation = document.createElement('article');
			$(mon_article_creation).addClass('col my-3');
			mon_article_creation.id = 'nouvelle_table';

		var section_creation = document.createElement('section');
			$(section_creation).addClass('card rounded-top').css("width","16rem");

		var div_card_creation = document.createElement('div');
			$(div_card_creation).addClass('card-body bg-grey-darkskin border border-IFA rounded-top');

		var titre_creation = document.createElement('h5');
			$(titre_creation).addClass('card-title text-white');

		var div_card_text_creation = document.createElement('div');
			$(div_card_text_creation).addClass('card-text my-2');

		var div_input_creation = document.createElement('div');
			$(div_input_creation).addClass('input-group input-group-sm');

		var input_creation = document.createElement('input');
			$(input_creation).addClass("form-control").attr("type","text").attr("placeholder","Titre").attr("onkeypress","if (event.keyCode == 13) creer_table()");
			input_creation.id = 'titre_table';

		var div_input_group_creation = document.createElement('div');
			$(div_input_group_creation).addClass('input-group-append');

		var button_creation = document.createElement('button');
			$(button_creation).addClass("btn btn-outline-grey").attr("type","button").attr("onclick","onclick","creer_table()").attr("id","btn_table");

		/* imbrication */
		mon_article_creation.append(section_creation);
		section_creation.append(div_card_creation);
		div_card_creation.append(titre_creation);
		titre_creation.append("Ajouter une table");
		div_card_creation.append(div_input_creation);
		div_input_creation.append(input_creation);
		div_input_creation.append(div_input_group_creation);
		div_input_group_creation.append(button_creation);
		button_creation.append("Créer");

		/* On ajoute le tout imbriqué dans la div "ma_base" à la suite */	
		$("#ma_base").append(mon_article_creation);

		ma_tache = 0;
		id_table++;	// incrémentation de l'id unique de la table	

		// On reprend le même id que dans le précédent chapitre

		/*$("#btn_table").click(function(){
		     
		    $.ajax({
		       url : 'test.php',
		       type : 'POST',
		       dataType : 'html',
		       success : function(code_html, statut){
		           $(code_html).appendTo("#ma_base"); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
		       },

		       error : function(resultat, statut, erreur){
		         
		       },

		       complete : function(resultat, statut){

		       }

		    });
		   
		});*/


}


/* suppression de ma table */

function supprimer_table(id_table)
{
	$('#'+id_table).remove();
}


/* création d'une tache dans une liste */

var id_tache_increment = 0; // id unique pour chaque tâche

function creer_tache(id_liste,id_input,id_li_input,titre_table)
{

	//----------------------    ETAPE 1    -----------------------------------------------

	/* création de la tache visible dans table */

	id_tache = id_liste + '-' + id_tache_increment; // id unique pour chaque tâche li (ex : ma_liste-0-0) en utilisant id de la liste

	var lien_modal = document.createElement('a');
		$(lien_modal).addClass("tache").attr("data-toggle","modal");
		lien_modal.href = '#' + id_tache;
		lien_modal.id = '#' + id_tache;

	var ma_tache_liste = document.createElement("li");
		$(ma_tache_liste).addClass("list-group-item tache_detail border border-dark my-1");

	var titre_tache = document.createElement("h6");
	

	lien_modal.append(ma_tache_liste);
	ma_tache_liste.append(titre_tache);
	titre_tache.append($("#"+id_input).val());

	$('#'+id_liste).append(lien_modal);



	/*
		// nombre de li dans une liste 
	var test = document.getElementById(id_liste).getElementsByTagName('li');
	for (var i = 1 ; i < test.length; i++) 
	{
		console.log(test[i]);
	}
	*/

	//----------------------    ETAPE 2    -----------------------------------------------

	/* création de la fenêtre modale liée à la tâche visible lors du click */

	// modal header

		var modal_fade = document.createElement('div');
			modal_fade.id = id_tache;
			$(modal_fade).addClass("modal fade").attr("tabindex","-1").attr("role","dialog").attr("aria-hidden","true").attr("aria-labelledby",id_tache+"Label");

		var modal_dialog = document.createElement('div');
			modal_dialog.className = 'modal-dialog modal-dialog-centered';
			modal_dialog.setAttribute('role','document');

		var modal_content = document.createElement('div');
			$(modal_content).addClass('modal-content bg-grey');

		var modal_header = document.createElement('div');
			$(modal_header).addClass('modal-header');
			modal_header.className = 'modal-header container';

		var div_header_row = document.createElement('div');
			div_header_row.className = 'row ml-2';

		var modal_title = document.createElement('h3'); 
			$(modal_title).addClass('modal-title text-dark');

		var modal_span_small = document.createElement('span');

		var modal_small = document.createElement('small');
			$(modal_small).addClass('badge badge-pill badge-info');

		var modal_small_icon = document.createElement('small');

		var modifier_title = document.createElement('input');
			$(modifier_title).attr("type","image").attr("src","./src/img/modifier_small.png");

		var supprimer_title = document.createElement('input');
			$(supprimer_title).addClass("close").attr("type","image").attr("src","./src/img/supprimer_small.png").attr("onclick",'supprimer_tache("'+lien_modal.id+'","'+modal_fade.id+'")').attr("data-dismiss","modal").attr("aria-label","close"); 

		var button_close = document.createElement('button');
			$(button_close).addClass("close").attr("type","button").attr("data-dismiss","modal").attr("aria-label","close");

		var span = document.createElement('span');
			$(span).attr("aria-hidden","true");


			supprimer_title.type = 'image'; 
			supprimer_title.src = './src/img/supprimer_small.png';
			supprimer_title.setAttribute('onclick','supprimer_tache("'+lien_modal.id+'","'+modal_fade.id+'")');
			supprimer_title.setAttribute('data-dismiss','modal');
			supprimer_title.setAttribute('aria-label','close'); 

		// modal body 

		var modal_body = document.createElement('div');
			$(modal_body).addClass('modal-body');

		var form_group_modal = document.createElement('div');
			$(form_group_modal).addClass('form-group');

		var container_modal = document.createElement('div');
			$(container_modal).addClass('container');

	/*	var row_modal = document.createElement('div');
			row_modal.className = 'row';
		var col_modal = document.createElement('div');
			col_modal.className = 'col';
		var small = document.createElement('small'); // PS ajouter createTexteNode
			small.className = 'col';
		var button_modifier_modal = document.createElement('button');
			button_modifier_modal.className = 'btn btn-info btn-sm';
		var button_modifier_modal_text = document.createTextNode('modifier'); // texte
		var button_supprimer_modal = document.createElement('button');
			button_supprimer_modal.className = 'btn btn-danger btn-sm';
		var button_supprimer_modal_text = document.createTextNode('supprimer'); //texte */

		var label = document.createElement('label');
			$(label).addClass('text-left text-grey').attr("for","comment");

		var textarea = document.createElement('textarea');
			$(textarea).addClass("form-control border border-dark").attr("rows","5").attr("id","comment");

		// modal footer

		var modal_footer = document.createElement('div');
			$(modal_footer).addClass('modal-footer');

		var button_annuler_modal = document.createElement('button');
			$(button_annuler_modal).addClass("btn btn-grey").attr("type","button").attr("data-dismiss","modal");

		var button_sauvegarder_modal = document.createElement('button');
			$(button_sauvegarder_modal).addClass("btn btn-sauvegarder").attr("type","button");


		modal_fade.append(modal_dialog);
		modal_dialog.append(modal_content);
		modal_content.append(modal_header);
		modal_header.append(modal_title);
		modal_title.append($("#"+id_input).val());
		modal_header.append(modal_small);
		modal_small.append($("#"+titre_table).html());
		modal_header.append(modal_small_icon);
		modal_small_icon.append(modifier_title);
		modal_small_icon.append(supprimer_title);
		modal_header.append(button_close);
		button_close.append(span);
		modal_content.append(modal_body)
		modal_body.append(form_group_modal);
		form_group_modal.append(container_modal);
	/*	container_modal.appendChild(row_modal);
		row_modal.appendChild(col_modal);
		col_modal.appendChild(small);
		col_modal.appendChild(button_modifier_modal);
		button_modifier_modal.appendChild(button_modifier_modal_text);
		col_modal.appendChild(button_supprimer_modal);
		button_supprimer_modal.appendChild(button_supprimer_modal_text); */
		form_group_modal.append(label);
		label.append("Ajouter détails");
		form_group_modal.append(textarea);
		modal_content.append(modal_footer);
		modal_footer.append(button_annuler_modal)
		button_annuler_modal.append("Annuler");
		modal_footer.append(button_sauvegarder_modal);
		button_sauvegarder_modal.append("Sauvegarder");



		$('#fenetre_modal').append(modal_fade);


		//----------------------    ETAPE 3    -----------------------------------------------	


		/* supprimer input liée à la liste */

		supprimer_input(id_li_input);


		//----------------------    ETAPE 4    -----------------------------------------------

		/* création d'un nouvel input */

		var liste_input_carte = document.createElement("li");
			$(liste_input_carte).addClass("input-group input-group-sm my-1")
			liste_input_carte.id = id_li_input;

		var input_carte = document.createElement("input");
			input_carte.id = id_input;
			$(input_carte).addClass("form-control border border-dark").attr("type","text").attr("placeholder","Ajouter tâche").attr("onkeypress",'if (event.keyCode == 13) creer_tache("'+id_liste+'","'+id_input+'","'+id_li_input+'","'+titre_table+'")');


		var div_bouton_carte = document.createElement("div");
			$(div_bouton_carte).addClass("input-group-append");


		var bouton_carte_creer = document.createElement("button");
			$(bouton_carte_creer).addClass("btn btn-outline-grey").attr("type","button").attr("onclick","creer_tache('"+id_liste+"','"+id_input+"','"+id_li_input+"','"+titre_table+"')");

		liste_input_carte.append(input_carte);
		liste_input_carte.append(div_bouton_carte);
		div_bouton_carte.append(bouton_carte_creer);
		bouton_carte_creer.append("Créer");

		$('#'+id_liste).append(liste_input_carte);


	//-------------------------------------------------------------------------------------------

	
	// nombre de li dans une liste 

	var nb_tache = document.getElementById(id_liste).getElementsByTagName('li');

	id_tache_increment++; // incrémentation de id_tache

	console.log(lien_modal.href);
}


/* suppression de li input */

function supprimer_input(id_input)
{
	$('#'+id_input).remove();
}




/* crée un input dans la balise "titre" */

function modifier_table(id_titre,id_table)
{
	
	console.log(id_titre);
	var parentNode =  document.getElementById(id_titre);
	var mon_titre = document.getElementById(id_titre).getElementsByTagName('div')[0];

	if (typeof mon_titre != "undefined") 
	{
		if (mon_titre.parentNode) 
		{
			mon_titre.parentNode.removeChild(mon_titre);
		}
	} 
	else 
	{
		var mon_titre = $("#"+id_titre);

		//mon_titre.innerHTML = '<div class="input-group input-group-sm"><input type="text" class="form-control" value="'+mon_titre.innerHTML+'" placeholder="Titre" id="titre_table" onkeypress="if (event.keyCode == 13) creer_table()" /><div class="input-group-append"><button class="btn btn-outline-secondary" type="button"  onclick="creer_table()">Créer</button></div></div>'

		var div_input_creation = document.createElement('div');
			$(div_input_creation).addClass('input-group input-group-sm');

		var input_creation = document.createElement('input');
			input_creation.id = 'titre_modif_'+id_table; // id unique pour input de modification liée à la table
			$(input_creation).addClass("form-control").attr("type","text").attr("placeholder","Titre").attr("value",mon_titre.html()).attr("onkeypress",'if (event.keyCode == 13) modification_texte("'+id_titre+'","'+input_creation.id+'")');

		var div_input_group_creation = document.createElement('div');
			$(div_input_group_creation).addClass("input-group-append");

		var button_creation = document.createElement('button');
			$(button_creation).addClass("btn btn-outline-grey").attr("type","button").attr("onclick",'modification_texte("'+id_titre+'","'+input_creation.id+'")');

		div_input_creation.append(input_creation);
		div_input_creation.append(div_input_group_creation);
		div_input_group_creation.append(button_creation);
		button_creation.append("Modifier");

		mon_titre.append(div_input_creation);

	}

}


/* Remplace le titre déjà présent (↑) par le nouveau titre saisie dans l'input */

function modification_texte(id_titre,titre_modif)
{
	$('#'+id_titre).html($("#"+titre_modif).val());
}



/* Crée un élément "input texte" afin de modifier les informations personnelles de l'user */

var display = false;

function modifier_info()
{
	nb = $('td');

	for (var i = 0; i < nb.length; i++)
	{
		
		id = 'user_'+ (i+1);
		var form = document.getElementsByTagName('td')[i].getElementsByTagName('form')[0];

		if (typeof form != "undefined") 
		{
			if (form.parentNode) 
			{
				form.parentNode.removeChild(form); // évite les multiplications de l'élément "input"
			}
		} 
		else 
		{
			console.log(nb[i].innerHTML);

			var form = document.createElement('form');
				$(form).attr("action","#").attr("method","POST").css('display','true');

			var div = document.createElement('div');
				$(div).addClass("input-group input-group-sm");

			var input = document.createElement('input');
				$(input).addClass("form-control").attr("type","text").attr("value",nb[i].innerHTML).attr("name","modifier_info_user").attr("required","true");

			var div_submit = document.createElement('div');
				$(div_submit).addClass("input-group-append")

			var input_submit = document.createElement('input');
				$(input_submit).addClass("btn btn-outline-success").attr("type","submit").attr("name",id).attr("value","Modifier");

			form.append(div);
			div.append(input);
			div.append(div_submit);
			div_submit.append(input_submit);

			nb[i].append(form);
		}
	}
}


function supprimer_tache(id_tache,id_modal)
{
	var li = document.getElementById(id_tache);
	var modal = document.getElementById(id_modal);
	

	if (li.parentNode && modal.parentNode) 
	{
		li.parentNode.removeChild(li);
		modal.parentNode.removeChild(modal);
	}
	console.log(modal);
}

