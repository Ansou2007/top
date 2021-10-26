		function ListeDepartement(val) {
			$.ajax({
			type: "POST",
			url: "liste_departement.php",
			data:'id_region='+val,
			success: function(data){
				$("#liste_departement").html(data);
			}
			});
			}