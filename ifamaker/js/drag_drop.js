var dropper1 = document.getElementsByTagName("article")[3];

dropper1.addEventListener('dragenter',function(e) {
	dropper1.style.borderStyle = "dashed";
});

dropper1.addEventListener('dragleave',function(e) {
	dropper1.style.borderStyle = "";
});

document.addEventListener('dragend',function(e) {
	alert("hors zone ! ");
});

dropper1.addEventListener('drop',function(e) {
	e.preventDefault();
	
	alert("yesss !");
});