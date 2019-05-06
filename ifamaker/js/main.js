
/* déclaration de l'id unique de ma table */

var id_table = 0;

function creer_table()
{

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
		liste_carte.id = "ma_liste-" + mon_article.id;


	var liste_input_carte = document.createElement("li");
		liste_input_carte.className = "list-group-item";


	var div_input_carte = document.createElement("div");
		div_input_carte.className = "input-group input-group-sm";

	var input_carte = document.createElement("input");
		input_carte.type = "text";
		input_carte.className = "form-control";
		input_carte.placeholder = "Tache";
		input_carte.id = 'titre_tache';
		input_carte.setAttribute('onkeypress','if (event.keyCode == 13) creer_tache("'+liste_carte.id+'")');


	var div_bouton_carte = document.createElement("div");
		div_bouton_carte.className = "input-group-append";


	var bouton_carte_creer = document.createElement("button");
		bouton_carte_creer.className = "btn btn-outline-secondary";
		bouton_carte_creer.type = "button";
		bouton_carte_creer.setAttribute("onclick","creer_tache('"+liste_carte.id+"')");

		console.log(liste_carte.id);


		bouton_carte_creer_element = document.createTextNode("Créer");


	var bouton_carte_modifier = document.createElement("button");
		bouton_carte_modifier.className = "btn btn-primary card-link";
		bouton_carte_modifier.href = "#";
		bouton_carte_modifier.setAttribute("onclick","modifier_table('titre-"+mon_article.id+"',"+mon_article.id+")");

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

		/* On supprime la table qui nou permet de créer une nouvelle table */
		supprimer_table('nouvelle_table');  

		////////////////////////////////////////////////////////////////////////

		/* on crée à la suite une nouvelle table permettant la creation d'une table */

		var mon_article_creation = document.createElement('article');
			mon_article_creation.className = 'col my-3'
			mon_article_creation.id = 'nouvelle_table';

		var section_creation = document.createElement('section');
			section_creation.className = 'card';
			section_creation.style.width = '16rem';

		var div_card_creation = document.createElement('div');
			div_card_creation.className = 'card-body';

		var titre_creation = document.createElement('h5');
			titre_creation.className = 'card-title';

		var titre_texte_creation = document.createTextNode('Ma nouvelle table');

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
			button_creation.className = 'btn btn-outline-secondary';
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
		id_table++;		

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

ma_tache = 1;


function creer_tache(id_liste,id_table)
{
	var ma_tache_liste = document.createElement("li");
		ma_tache_liste.className = "list-group-item";

	var titre_tache = document.createElement("h6");
	
	titre_tache_element = document.createTextNode(document.getElementById('titre_tache').value);

	ma_tache_liste.appendChild(titre_tache);
	titre_tache.appendChild(titre_tache_element);

	document.getElementById(id_liste).appendChild(ma_tache_liste);

}


/* crée un input dans la balise "titre" */

function modifier_table(id_titre,id_table)
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


/* Remplace le titre déjà présent (↑) par le nouveau titre saisie dans l'input */

function modification_texte(id_titre,titre_modif)
{
	var mon_titre = document.getElementById(id_titre);
	mon_titre.innerHTML = document.getElementById(titre_modif).value;
}

