$(".money").mask("#.##0,00", {
  reverse: true,
  maxlength: false
});


$(".competence").mask("00/0000");
$(".data").mask("00/00/0000");
$('.cpf').mask('000.000.000-00', {reverse: true});
$('.rg').mask('0000000000');
$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
$(".cep").mask("00.000-000");
$(".time").mask("00:00:00");
$(".hora").mask("00:00");
$(".date_time").mask("00/00/0000 00:00:00");
$(".data_hora").mask("00/00/0000 00:00");
$(".period").mask("0000 - 0000");
$(".period2").mask("00/00/0000 - 00/00/0000");
$(".period3").mask("00:00 - 00:00");


var maskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
onKeyPress: function (val, e, field, options) {
  field.mask(maskBehavior.apply({}, arguments), options);
}
};
$('.phone').mask(maskBehavior, options);