$(document).ready(function(e) {
	
	$('form').on('submit', function(e){
		e.preventDefault();

	});
	$(document).on('click','#sbmt',function(){
		emptyTable();
		getData(callback);
	});
});
var emptyTable = ()=>{
	$(".table > tbody").empty();
};
var callback = function (json){
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
function getData(callback){
	 $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
	$.ajax({
		type:"post",
		url: "api/search",
		data:{keyword:$("#keyword").val()},
		dataType:"json"
	}).done(callback);
}
