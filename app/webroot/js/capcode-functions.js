$(document).ready(function(){
    $('.capcodeTA').typeahead({
            items: 15,
            source: function(typeahead, query) {
                $.ajax({
                    url: "/flex2sms/Capcodes/ajax_findAlias/",
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
	$('#ServiceName').val($('#ServiceType').val()+'/'+$('#ServiceCapcodeSelector').val());
});

});
