$(document).ready(function(){
    $('.capcodeTA').typeahead({
        items: 15,
        source: function(typeahead, query) {
            $.ajax({
                url: BASE_PATH + "Capcodes/ajax_findAlias/",
                dataType: "json",
                type: "POST",
                data: {search_key: query},
                success: function(data) {
                    var return_list = [], i = data.length;
                        while (i--) {
                        return_list[i] = {id: data[i].id, value: data[i].alias};
                        }
                typeahead.process(return_list);
                }
            });
        },
        onselect: function(obj) {
        $('input[id="ServiceCapcodeId"]').val(obj.id);
    }
});

$('#NameAutofill').bind("click",function(){
    var keywords = '';
    var suggestedName = $('#ServiceType').val()+'/'+$('#ServiceCapcodeSelector').val();
    $('input[name*="Keyword"]').each(function(i){
        if(this.checked==1) {
                keywords = keywords +'+'+ $(this.parentNode).text();
            }
    });
    if(keywords.length > 1) {
            suggestedName = suggestedName+'/'+keywords;
        }
    $('#ServiceName').val(suggestedName);
});

$('.to_modal').click(function(e) {
    e.preventDefault();
    var href = $(e.target).attr('href');
    if(href.indexOf('#') == 0) {
        $(href).modal('open');
    } else {
        $.get(href, function(data) {
            $(data).modal();
        });
    }
});

$('#ContactBrigadeId').bind("change",function(){
     $.getJSON(BASE_PATH + "Services/suggest/"+$('#ContactBrigadeId').val(), function(data){ highlightServices(data); });
});
});

function highlightServices(json) { 
    $(".checkbox").attr('class','checkbox');
    for (var id in json) {
            $("#ServiceService"+json[id]).parent().attr('class','checkbox text-info');
        }
}
