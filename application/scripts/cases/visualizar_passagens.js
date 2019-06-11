function info(id, idOnibus) {
	$.ajax({
		data: "alocacaointermunicipal_id=" + id + "&onibus_id=" + idOnibus,
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

				// $("#id_total").val(result["data"].length);
				$("#id_mes_passagem").val(
					result["data"][0]["alocacaointermunicipal_horaInicio"]
				);
				var soma = 0;
				var inteira = 0;
				var isenta = 0;
				var meia = 0;
				for (var i = 0; i < result["data"].length; i++) {
					if (result["data"][i]["tipo_passagem_nome_tipo"] === "Inteira") {
						inteira = parseFloat(
							result["data"][i]["comprapassagem_valor_compra"]
						);
						$("#id_inteiras_quantidade").val(
							result["data"][0][
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}
					if (result["data"][i]["tipo_passagem_nome_tipo"] === "Isenta") {
						isenta = parseFloat(result["data"][i]["comprapassagem_valor_compra"]);
						$("#id_isentas_quantidade").val(
							result["data"][0][
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}
					if (result["data"][i]["tipo_passagem_nome_tipo"] === "Meia") {
						meia = parseFloat(result["data"][i]["comprapassagem_valor_compra"]);
						$("#id_meias_quantidade").val(
							result["data"][0][
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}
				}
				soma = inteira + isenta + meia;
				$("#id_soma_total").val("R$" + soma.toFixed(2));
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
