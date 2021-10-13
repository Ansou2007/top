
document.getElementById("inscription").addEventListener("submit",function(e){
	
	var erreur;
	var saisie = document.getElementsByTagName("input");
	
	for(var i = 0; i<saisie.length; i++){
		if(!saisie[i].value){
			erreur = "Saisir tous les champs";
		}
	}
	if(erreur){
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	}else{
		alert("Inscription Réussie");
	}
	
})