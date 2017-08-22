$(function()
{
	js.init();
});

var js =
{
	init: function()
	{
		$(".box li").bind("hover", function() {
		$(this).animate({left: '+=5px'}, 2000);
    		});


	}
}

$(document).ready(function(){
    $("#form-cadastro").validate({
  rules: {
    email: "required",
    confEmail: {
      equalTo: "#email"
    }
  },

messages:{
 			email:{
				required: "Digite o seu e-mail para contato",
 				confEmail: "Digite um e-mail válido" } , }

});
  });

// $(document).ready( function() {
// 	$("#form-cadastro").validate({
// 		// Define as regras
// 		rules:{
// 			campoEmail:{
// 				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
// 				required: true, email: true
// 			},
// 		},
// 		// Define as mensagens de erro para cada regra
// 		messages:{
// 			campoEmail:{
// 				required: "Digite o seu e-mail para contato",
// 				email: "Digite um e-mail válido"
// 			},
// 		}
// 	});
// });