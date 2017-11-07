$(document).ready(function(e) {
	
	$('#form-search').on('submit', function(e){
		e.preventDefault();
	});
	$("#keyword").keydown(function (e) {
		if (e.keyCode == 13) {
			e.preventDefault();
		}
	});

	$(document).on('click','#sbmt',function(event){
		event.preventDefault();
		emptyElement();
		getData(callback);
	});
});
var emptyElement = ()=>{
	$(".table > tbody").empty();
	$( '#form-errors' ).empty();
};
var callback = function (json){
	if(json.data.length==0){
		$('.table > tbody:last-child').append(
			"<center><h2>No se encontraron resultados</h2></center>"
			);
	}else{
		$.each(json.data, function (i,item){
			$('.table > tbody:last-child').append(
				'<tr>'
				+'<td>'+item.idproducto+'</td>'
				+'<td>'+item.titulo+'</td>'
				+'<td>'+item.descripcion+'</td>'
				+'<td>'+item.tags+'</td>'
				+'</tr>');
		});
	}
	
	
}
function getData(callback){
	$.ajaxSetup({
		header:$('meta[name="_token"]').attr('content')
	})
	$.ajax({
		type:"post",
		url: "api/search",
		data:{keyword:$("#keyword").val()},
		dataType:"json",
		error: function( jqXhr ) {
			if( jqXhr.status === 422 ) {

       	var  errors = jQuery.parseJSON(jqXhr.responseText);
       	errorsHtml = '<div class="alert alert-danger"><ul>';
       	errorsHtml += '<li>' + errors.message + '</li>';
       	errorsHtml += '</ul></di>';

        $( '#form-errors' ).html( errorsHtml );
    } 
}
}).done(callback);
	
}
