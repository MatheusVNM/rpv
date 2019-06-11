function info(id) {
	$.ajax({
		data: "comprapassagem_id=" + id,
		method: "post",
		dataType: "json",
		url: "<?= base_url('ajax/passagens/vendidas/getSingle') ?>",
		beforeSend: function() {
			showLoadingModal("Buscando Dados Completos das vendas");
		},
		success: function(result) {
			if (result["success"]) {
				console.log("success", result);
				console.log(result["data"].length);
				$("#id_inteiras_quantidade").val(
					result["data"][0][
						"COUNT(comprapassagem.comprapassagem_tipo_passagem_id)"
					]
				);
				$("#id_isentas_quantidade").val(
					result["data"][0][
						"COUNT(comprapassagem.comprapassagem_tipo_passagem_id)"
					]
				);
				$("#id_meias_quantidade").val(
					result["data"][0][
						"COUNT(comprapassagem.comprapassagem_tipo_passagem_id)"
					]
				);
				$("#id_total").val(result["data"].length);
				$("#id_modal_info").modal("show");
			} else {
				alert("Informações não encontradas");
				console.log("false success", result);
			}
		},
		error: function(error) {
			// showWarningModal(JSON.stringify(error))
			console.log(error);
		},
		complete: function() {
			setTimeout(closeLoadingModal, 500);
		}
	});
}
