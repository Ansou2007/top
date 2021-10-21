$.ajax({
	type : "POST",
	url : "liste_commune.php",
	data : 'id_departement'=+val,
	success : function(data){
		$("#liste_commune").html(data);
	}
})