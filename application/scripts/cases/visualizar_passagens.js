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
			// console.log(result)
			if (result["success"]) {
				console.log("success", result);
				console.log(result["data"].length);

				$("#id_inteiras_quantidade").val("0")
				$("#id_meias_quantidade").val("0")
				$("#id_isentas_quantidade").val("0")
				// $("#id_total").val(result["data"].length);
				// $("#id_mes_passagem").val(
				// 	result["data"][0]["alocacaointermunicipal_horaInicio"]
				// );
				var soma = 0;
				var inteiraValor = 0;
				var isentaValor = 0;
				var meiaValor = 0;

				$.each(result["data"], function(key, value){
					if (value["tipo_passagem_nome_tipo"] === "Inteira") {
						inteiraValor = parseFloat(
							value["comprapassagem_valor_compra"]
						);
						$("#id_inteiras_quantidade").val(
							value[
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}else if (value["tipo_passagem_nome_tipo"] === "Isenta") {
						isentaValor = parseFloat(value["comprapassagem_valor_compra"]);
						$("#id_isentas_quantidade").val(
							value[
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}else if (value["tipo_passagem_nome_tipo"] === "Meia") {
						meiaValor = parseFloat(value["comprapassagem_valor_compra"]);
						$("#id_meias_quantidade").val(
							value[
								"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
							]
						);
					}
				})
				// for (var i = 0; i < result["data"].length; i++) {
				// 	if (result["data"][i]["tipo_passagem_nome_tipo"] === "Inteira") {
				// 		inteiraValor = parseFloat(
				// 			result["data"][i]["comprapassagem_valor_compra"]
				// 		);
				// 		$("#id_inteiras_quantidade").val(
				// 			result["data"][0][
				// 				"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
				// 			]
				// 		);
				// 	}
				// 	if (result["data"][i]["tipo_passagem_nome_tipo"] === "Isenta") {
				// 		isentaValor = parseFloat(result["data"][i]["comprapassagem_valor_compra"]);
				// 		$("#id_isentas_quantidade").val(
				// 			result["data"][0][
				// 				"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
				// 			]
				// 		);
				// 	}
				// 	if (result["data"][i]["tipo_passagem_nome_tipo"] === "Meia") {
				// 		meiaValor = parseFloat(result["data"][i]["comprapassagem_valor_compra"]);
				// 		$("#id_meias_quantidade").val(
				// 			result["data"][0][
				// 				"COUNT(comprapassagem.comprapassagem_tipo_passagem)"
				// 			]
				// 		);
				// 	}
				// }
				soma = inteiraValor + isentaValor + meiaValor;
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
