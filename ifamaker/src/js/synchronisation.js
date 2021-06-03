/* Verifie toutes les secondes si le nb de taches et de listes correspond bien au nb présent dans la BDD */

function refresh()
{
	$.post(
		'src/AJAX/refresh.php',
		{
			id_board : $_GET('id'),
			nb_list : $('.ma_listeid').length,
			nb_task : $('.tache_detail').length
		},

		function(data){

			if (data == 'success') 
			{
				window.location.reload();
			}
			else
			{
				
			}
		}
	);
}

window.setInterval(refresh,2000);
