$('.ma_zone').sortable({
	connectWith : $('.card-liste'),
	revert : true,
	cursor : "move",
	placeholder : 'grey',
	forcePlaceholderSize : true
})

$('.groupe_tache').sortable({
	connectWith : $('.groupe_tache'),
	revert : true,
	cursor : "move",
	placeholder : 'bg-primary',
	forcePlaceholderSize : true
})
