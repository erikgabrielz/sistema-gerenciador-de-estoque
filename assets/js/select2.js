$(document).ready(function() {
  $('#Brand').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#Category').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#Extra').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#Product').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#Type').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#Supplier').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#uf').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});

$(document).ready(function() {
  $('#city').select2({
    placeholder: "Selecione uma opção",
    allowClear: false
  });
});


if(window.location.href == `${BASE_URL}/clientes/add`){
	{
		const input = document.getElementById('cpf');
		const maskOptions = {
			mask: [
				{ mask: '000.000.000-00', maxLength: 11 },
				{ mask: '00.000.000/0000-00', maxLength: 14 }
			],
			dispatch: function(appended, dynamicMasked) {
				const number = (dynamicMasked.value + appended).replace(/\D/g, '');
				return number.length <= 11 ? dynamicMasked.compiledMasks[0] : dynamicMasked.compiledMasks[1];
			}	
		};
		IMask(input, maskOptions);
	}  


	{
	const input = document.getElementById('phone');
		const maskOptions = {
			mask: [
				{
				mask: '(00) 00000-0000',
				maxLength: 11
				}
			],
			dispatch: function (appended, dynamicMasked) {
				return dynamicMasked.compiledMasks[0];
			}
		};
		IMask(input, maskOptions);
	}
}