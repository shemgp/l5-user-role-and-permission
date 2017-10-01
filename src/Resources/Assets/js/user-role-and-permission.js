let jQuery = require('jquery'),
    select2 = require('select2');

window.jQuery = jQuery;
window.$ = window.jQuery;
window.select2 = select2;

$(() => {
    //$.fn.select2.defaults.set("ajax--delay", 50);
    //$.fn.select2.defaults.set("ajax--cache", false);
    //$.fn.select2.defaults.set("ajax--dataType", 'json');
    $.fn.select2.defaults.set("allowClear", true);

    let s2Show = $("#s2Show"), s2Order = $("#s2Order"), s2OrderBy = $("#s2OrderBy");

    if (s2Show) {
        s2Show.select2({
            placeholder: 'Mostrar',
        });
    }

    if (s2Order) {
        s2Order.select2({
            placeholder: 'Dirección',
        });
    }

    if (s2OrderBy) {
        s2OrderBy.select2({
            placeholder: 'Ordenar por',
        });
    }

    let s2DocumentType = $("#s2DocumentType");

    if (s2DocumentType) {
        s2DocumentType.select2({
            placeholder: 'Tipo de documento',
        });
    }
});
