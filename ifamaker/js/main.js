
/* déclaration de l'id unique de ma table */

var id_table = 0; // id unique pour chaque table
var updated = false; // variable servant à la modification du titre de la table

function creer_table()
{

	//----------------------    ETAPE 1    -----------------------------------------------

	/* création de mes noeuds constituant une table */

	var mon_article = document.createElement("article");
		mon_article.className = "col my-3";
		mon_article.id = id_table; // incrémentation de l'id unique de ma table*/


	var ma_section = document.createElement("section");
		ma_section.className = "card";
		ma_section.style.width = "16rem";



	var div_carte_body = document.createElement("div");
		div_carte_body.className = "card-body";


	var titre_carte = document.createElement("h5");
		titre_carte.className = "card-title";

	var span_titre_carte = document.createElement("span");
		span_titre_carte.id = 'titre-' + id_table; // id unique du titre de la table


	var	titre_carte_element = document.createTextNode(document.getElementById('titre_table').value);


	var texte_carte = document.createElement("div");
		texte_carte.className = "card-text my-2";

	var liste_carte = document.createElement("ul");
		liste_carte.className = "list-group";
		liste_carte.id = "ma_liste-" + mon_article.id; // id unique de la liste


	var liste_input_carte = document.createElement("li");
		liste_input_carte.className = "list-group-item";
		liste_input_carte.id = 'li-'+id_table; // id unique du li qui contient balise input (titre , cf : fonction supprimer_input)


	var div_input_carte = document.createElement("div");
		div_input_carte.className = "input-group input-group-sm";

	var input_carte = document.createElement("input");
		input_carte.type = "text";
		input_carte.className = "form-control";
		input_carte.placeholder = "Ajouter tâche";
		input_carte.id = 'titre_tache-' + id_table;
		input_carte.setAttribute('onkeypress','if (event.keyCode == 13) creer_tache("'+liste_carte.id+'","'+input_carte.id+'","'+liste_input_carte.id+'")');


	var div_bouton_carte = document.createElement("div");
		div_bouton_carte.className = "input-group-append";


	var bouton_carte_creer = document.createElement("button");
		bouton_carte_creer.className = "btn btn-outline-secondary";
		bouton_carte_creer.type = "button";
		bouton_carte_creer.setAttribute("onclick","creer_tache('"+liste_carte.id+"','"+input_carte.id+"','"+liste_input_carte.id+"')");

		console.log(liste_carte.id);


		bouton_carte_creer_element = document.createTextNode("Créer");


	var bouton_carte_modifier = document.createElement("button");
		bouton_carte_modifier.className = "btn btn-primary card-link";
		bouton_carte_modifier.href = "#";
		bouton_carte_modifier.setAttribute("onclick","modifier_table('"+span_titre_carte.id+"',"+mon_article.id+")");
		console.log(span_titre_carte.id);
		bouton_carte_modifier_element = document.createTextNode("Modifier");


	var bouton_carte_supprimer = document.createElement("button");
		bouton_carte_supprimer.className = "btn btn-danger card-link";
		bouton_carte_supprimer.href = "#";
		bouton_carte_supprimer.setAttribute("onclick","supprimer_table("+mon_article.id+")");

		bouton_carte_supprimer_element = document.createTextNode("Supprimer");


		/* on imbrique le tout */

		mon_article.appendChild(ma_section);
		ma_section.appendChild(div_carte_body);
		div_carte_body.appendChild(titre_carte);
		titre_carte.appendChild(span_titre_carte);
		span_titre_carte.appendChild(titre_carte_element);
		div_carte_body.appendChild(texte_carte);
		texte_carte.appendChild(liste_carte);
		liste_carte.appendChild(liste_input_carte);
		liste_input_carte.appendChild(div_input_carte);
		div_input_carte.appendChild(input_carte);
		div_input_carte.appendChild(div_bouton_carte);
		div_bouton_carte.appendChild(bouton_carte_creer);
		bouton_carte_creer.appendChild(bouton_carte_creer_element);
		div_carte_body.appendChild(bouton_carte_modifier);
		bouton_carte_modifier.appendChild(bouton_carte_modifier_element);
		div_carte_body.appendChild(bouton_carte_supprimer);
		bouton_carte_supprimer.appendChild(bouton_carte_supprimer_element);

		/* on ajoute le contenu entier dans la div "ma_base" */
		document.getElementById("ma_base").appendChild(mon_article);


		//----------------------    ETAPE 2    -----------------------------------------------


		/* On supprime la table qui nou permet de créer une nouvelle table */

		supprimer_table('nouvelle_table');  


		//----------------------    ETAPE 3    -----------------------------------------------


		/* on crée à la suite une nouvelle table permettant la creation d'une table */

		var mon_article_creation = document.createElement('article');
			mon_article_creation.className = 'col my-3'
			mon_article_creation.id = 'nouvelle_table';

		var section_creation = document.createElement('section');
			section_creation.className = 'card rounded-top';
			section_creation.style.width = '16rem';

		var div_card_creation = document.createElement('div');
			div_card_creation.className = 'card-body bg-grey-darkskin border border-IFA rounded-top';

		var titre_creation = document.createElement('h5');
			titre_creation.className = 'card-title text-white';

		var titre_texte_creation = document.createTextNode('Ajouter une table');

		var div_card_text_creation = document.createElement('div');
			div_card_text_creation.className = 'card-text my-2';

		var div_input_creation = document.createElement('div');
			div_input_creation.className = 'input-group input-group-sm';

		var input_creation = document.createElement('input');
			input_creation.type = 'text';
			input_creation.placeholder = 'Titre';
			input_creation.id = 'titre_table';
			input_creation.className = 'form-control';
			input_creation.setAttribute('onkeypress','if (event.keyCode == 13) creer_table()')

		var div_input_group_creation = document.createElement('div');
			div_input_group_creation.className = 'input-group-append';

		var button_creation = document.createElement('button');
			button_creation.type = 'button';
			button_creation.className = 'btn btn-outline-grey';
			button_creation.setAttribute("onclick","creer_table()");

		var button_text_creation = document.createTextNode('Créer');

		/* imbrication */
		mon_article_creation.appendChild(section_creation);
		section_creation.appendChild(div_card_creation);
		div_card_creation.appendChild(titre_creation);
		titre_creation.appendChild(titre_texte_creation);
		div_card_creation.appendChild(div_input_creation);
		div_input_creation.appendChild(input_creation);
		div_input_creation.appendChild(div_input_group_creation);
		div_input_group_creation.appendChild(button_creation);
		button_creation.appendChild(button_text_creation);

		/* On ajoute le tout imbriqué dans la div "ma_base" à la suite */	
		document.getElementById("ma_base").appendChild(mon_article_creation);

		ma_tache = 0;
		id_table++;	// incrémentation de l'id unique de la table	

}


/* suppression de ma table */

function supprimer_table(id_table)
{
	var ma_table = document.getElementById(id_table);
	if (ma_table.parentNode) 
	{
		ma_table.parentNode.removeChild(ma_table);
	}
}


/* création d'une tache dans une liste */

var id_tache_increment = 0; // id unique pour chaque tâche

function creer_tache(id_liste,id_input,id_li_input)
{

	//----------------------    ETAPE 1    -----------------------------------------------

	/* création de la tache visible dans table */

	/*var id_tache_increment = 0; // id unique pour chaque tâche
	var nb_tache = document.getElementById(id_liste).getElementsByTagName('li');
	id_tache_increment = nb_tache.length; 			// nombre de li dans une liste 
	id_tache = id_liste + '-' + id_tache_increment; // id unique pour chaque tâche li (ex : ma_liste-0-0) en utilisant id de la liste
	console.log(id_tache);*/


	id_tache = id_liste + '-' + id_tache_increment; // id unique pour chaque tâche li (ex : ma_liste-0-0) en utilisant id de la liste

	var lien_modal = document.createElement('a');
		lien_modal.className = 'tache';
		lien_modal.href = '#' + id_tache;
		lien_modal.setAttribute('data-toggle','modal');

	var ma_tache_liste = document.createElement("li");
		ma_tache_liste.className = "list-group-item tache_detail";

	var titre_tache = document.createElement("h6");
	
	titre_tache_element = document.createTextNode(document.getElementById(id_input).value);

	lien_modal.appendChild(ma_tache_liste);
	ma_tache_liste.appendChild(titre_tache);
	titre_tache.appendChild(titre_tache_element);

	document.getElementById(id_liste).appendChild(lien_modal);



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
			modal_fade.className = 'modal fade';
			modal_fade.id = id_tache;
			modal_fade.setAttribute('tabindex','-1');
			modal_fade.setAttribute('role','dialog');
			modal_fade.setAttribute('aria-hidden','true');
			modal_fade.setAttribute('aria-labelledby',id_tache+'Label');

		var modal_dialog = document.createElement('div');
			modal_dialog.className = 'modal-dialog modal-dialog-centered';
			modal_dialog.setAttribute('role','document');

		var modal_content = document.createElement('div');
			modal_content.className = 'modal-content';

		var modal_header = document.createElement('div');
			modal_header.className = 'modal-header';

		var modal_title = document.createElement('h5'); // PS ajouter createTexteNode
			modal_title.className = 'modal-title';

		var modal_title_text = document.createTextNode(document.getElementById(id_input).value);

		var button_close = document.createElement('button');
			button_close.className = 'close';
			button_close.type = 'button';
			button_close.setAttribute('data-dismiss','modal');
			button_close.setAttribute('aria-label','close');

		var span = document.createElement('span');
			span.setAttribute('aria-hidden', 'true');

		var span_text = document.createTextNode('Fermer'); // texte

		// modal body 

		var modal_body = document.createElement('div');
			modal_body.className = 'modal-body';

		var form_group_modal = document.createElement('div');
			form_group_modal.className = 'form-group';

		var container_modal = document.createElement('div');
			container_modal.className = 'container';

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
			label.setAttribute('for','comment');
			label.className = 'text-left'

		var label_text = document.createTextNode('Détails:'); // texte

		var textarea = document.createElement('textarea');
			textarea.className = 'form-control';
			textarea.rows = '5';
			textarea.id ='comment';

		// modal footer

		var modal_footer = document.createElement('div');
			modal_footer.className = 'modal-footer';

		var button_annuler_modal = document.createElement('button');
			button_annuler_modal.className = 'btn btn-secondary';
			button_annuler_modal.type = 'button';
			button_annuler_modal.setAttribute('data-dismiss','modal');

		var button_annuler_modal_text = document.createTextNode('Annuler');

		var button_sauvegarder_modal = document.createElement('button');
			button_sauvegarder_modal.className ='btn btn-primary';
			button_sauvegarder_modal.type = 'button';


		var button_sauvegarder_modal_text = document.createTextNode('Sauvegarder'); // texte

		modal_fade.appendChild(modal_dialog);
		modal_dialog.appendChild(modal_content);
		modal_content.appendChild(modal_header);
		modal_header.appendChild(modal_title);
		modal_title.appendChild(modal_title_text);
		modal_header.appendChild(button_close);
		button_close.appendChild(span);
		span.appendChild(span_text);
		modal_content.appendChild(modal_body)
		modal_body.appendChild(form_group_modal);
		form_group_modal.appendChild(container_modal);
	/*	container_modal.appendChild(row_modal);
		row_modal.appendChild(col_modal);
		col_modal.appendChild(small);
		col_modal.appendChild(button_modifier_modal);
		button_modifier_modal.appendChild(button_modifier_modal_text);
		col_modal.appendChild(button_supprimer_modal);
		button_supprimer_modal.appendChild(button_supprimer_modal_text); */
		form_group_modal.appendChild(label);
		label.appendChild(label_text);
		form_group_modal.appendChild(textarea);
		modal_content.appendChild(modal_footer);
		modal_footer.appendChild(button_annuler_modal)
		button_annuler_modal.appendChild(button_annuler_modal_text);
		modal_footer.appendChild(button_sauvegarder_modal);
		button_sauvegarder_modal.appendChild(button_sauvegarder_modal_text);



		document.getElementById('fenetre_modal').appendChild(modal_fade);


		//----------------------    ETAPE 3    -----------------------------------------------	


		/* supprimer input liée à la liste */

		supprimer_input(id_li_input);


		//----------------------    ETAPE 4    -----------------------------------------------

		/* création d'un nouvel input */

		var liste_input_carte = document.createElement("li");
		liste_input_carte.className = "list-group-item";
		liste_input_carte.id = id_li_input;


		var div_input_carte = document.createElement("div");
			div_input_carte.className = "input-group input-group-sm";

		var input_carte = document.createElement("input");
			input_carte.type = "text";
			input_carte.className = "form-control";
			input_carte.placeholder = "Ajouter tâche";
			input_carte.id = id_input;
			input_carte.setAttribute('onkeypress','if (event.keyCode == 13) creer_tache("'+id_liste+'","'+id_input+'","'+id_li_input+'")');


		var div_bouton_carte = document.createElement("div");
			div_bouton_carte.className = "input-group-append";


		var bouton_carte_creer = document.createElement("button");
			bouton_carte_creer.className = "btn btn-outline-secondary";
			bouton_carte_creer.type = "button";
			bouton_carte_creer.setAttribute("onclick","creer_tache('"+id_liste+"','"+id_input+"','"+id_li_input+"')");

			bouton_carte_creer_element = document.createTextNode("Créer");

		liste_input_carte.appendChild(div_input_carte);
		div_input_carte.appendChild(input_carte);
		div_input_carte.appendChild(div_bouton_carte);
		div_bouton_carte.appendChild(bouton_carte_creer);
		bouton_carte_creer.appendChild(bouton_carte_creer_element);

		document.getElementById(id_liste).appendChild(liste_input_carte);




	//-------------------------------------------------------------------------------------------

	
	// nombre de li dans une liste 

	var nb_tache = document.getElementById(id_liste).getElementsByTagName('li');

	id_tache_increment++; // incrémentation de id_tache

	console.log(lien_modal.href);
}


/* suppression de li input */

function supprimer_input(id_input)
{
	var li = document.getElementById(id_input);
	if (li.parentNode) 
	{
		li.parentNode.removeChild(li);
	}
}




/* crée un input dans la balise "titre" */

function modifier_table(id_titre,id_table)
{
	
	console.log(id_titre);
	var parentNode =  document.getElementById(id_titre);
	var mon_titre = document.getElementById(id_titre).getElementsByTagName('div')[0];

	console.log(parentNode);
	console.log(mon_titre);

	if (typeof mon_titre != "undefined") 
	{
		if (mon_titre.parentNode) 
		{
			mon_titre.parentNode.removeChild(mon_titre);
		}
	} 
	else 
	{
		var mon_titre = document.getElementById(id_titre);

		//mon_titre.innerHTML = '<div class="input-group input-group-sm"><input type="text" class="form-control" value="'+mon_titre.innerHTML+'" placeholder="Titre" id="titre_table" onkeypress="if (event.keyCode == 13) creer_table()" /><div class="input-group-append"><button class="btn btn-outline-secondary" type="button"  onclick="creer_table()">Créer</button></div></div>'

		var div_input_creation = document.createElement('div');
			div_input_creation.className = 'input-group input-group-sm';

		var input_creation = document.createElement('input');
			input_creation.type = 'text';
			input_creation.placeholder = 'Titre';
			input_creation.id = 'titre_modif_'+id_table; // id unique pour input de modification liée à la table
			input_creation.value = mon_titre.innerHTML
			input_creation.className = 'form-control';
			input_creation.setAttribute('onkeypress','if (event.keyCode == 13) modification_texte("'+id_titre+'","'+input_creation.id+'")');

		var div_input_group_creation = document.createElement('div');
			div_input_group_creation.className = 'input-group-append';

		var button_creation = document.createElement('button');
			button_creation.type = 'button';
			button_creation.className = 'btn btn-outline-secondary';
			button_creation.setAttribute('onclick','modification_texte("'+id_titre+'","'+input_creation.id+'")');

		var button_text_creation = document.createTextNode('Modifier');

		div_input_creation.appendChild(input_creation);
		div_input_creation.appendChild(div_input_group_creation);
		div_input_group_creation.appendChild(button_creation);
		button_creation.appendChild(button_text_creation);

		mon_titre.appendChild(div_input_creation);

	}

}


/* Remplace le titre déjà présent (↑) par le nouveau titre saisie dans l'input */

function modification_texte(id_titre,titre_modif)
{
	var mon_titre = document.getElementById(id_titre);
	mon_titre.innerHTML = document.getElementById(titre_modif).value;
}



/* Crée un élément "input texte" afin de modifier les informations personnelles de l'user */

function modifier_info(id)
{
	var form = document.getElementById(id).getElementsByTagName('form')[0];
	console.log(form)

	if (typeof form != "undefined") 
	{
		if (form.parentNode) 
		{
			form.parentNode.removeChild(form); // évite les multiplications de l'élément "input"
		}
	} 
	else 
	{

		var form = document.createElement('form');
			form.action = '#';
			form.method = 'POST';

		var div = document.createElement('div');
			div.className = 'input-group input-group-sm';

		var input = document.createElement('input');
			input.type = 'text';
			input.value = document.getElementById(id).innerHTML;
			input.name = 'modifier_info_user';
			input.className = 'form-control';
			input.required = true;

		var div_submit = document.createElement('div');
			div_submit.className = 'input-group-append';

		var input_submit = document.createElement('input');
			input_submit.type = 'submit';
			input_submit.name = id;
			input_submit.value = 'Modifier';
			input_submit.className = 'btn btn-outline-success';

		form.appendChild(div);
		div.appendChild(input);
		div.appendChild(div_submit);
		div_submit.appendChild(input_submit);

		document.getElementById(id).appendChild(form);
	}
	
}





