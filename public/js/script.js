function orders_load(){
    $.ajax({
        url: "/load_orders",
        method: "post",
        dataType: "html",
        data: {id: 1}
    }).done(function(data)
    {
        $("#orders").html(data);
    }).fail(function(data)
    {

    });
}
