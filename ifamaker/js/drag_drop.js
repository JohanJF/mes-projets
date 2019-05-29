/*var dropper1 = document.getElementsByTagName("article")[3];

dropper1.addEventListener('dragover',function(e) {
	e.preventDefault();
	dropper1.style.borderStyle = "dashed";
});

dropper1.addEventListener('dragleave',function(e) {
	dropper1.style.borderStyle = "";
});

document.addEventListener('dragend',function(e) {
	alert("hors zone ! ");
});

dropper1.addEventListener('drop',function(e) {
	var target = e.target,

	
	alert("yesss !");
});*/

(function() {

	var dndHandler = {

		draggedElement : null ,

		applyDragEvents: function(element) {


			element.draggable = true;
			var dndHandler = this;

			element.addEventListener('dragstart',function(e) {
				dndHandler.draggedElement = e.target;
				e.dataTansfer.setData('text/plain','');
			});

		},

		applyDropEvents: function(dropper) {

			dropper.addEventListener('dragover',function(e){
				e.preventDefault();
				dropper.style.borderStyle = 'dashed';
			});

			dropper.addEventListener('dragleave', function() {
				dropper.style.borderStyle = '';
			});


			dropper.addEventListener('drop', function(e) {

				var target = e.target,
			    draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
			    clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément

				target.className = 'dropper'; // Application du style par défaut

				clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
				dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

				draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine

			});
		
		}
	};

	var elements = document.getElementsByTagName('article'),
        elementsLen = elements.length;

    for (var i = 0 ; i < elementsLen ; i++) {
        dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
    }

    var droppers = document.getElementsByTagName('article'),
        droppersLen = droppers.length;

    for (var i = 0 ; i < droppersLen ; i++) {
        dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
    }

})();