function orders_load(){
    $.ajax({
        url: "/load_orders",
        method: "get",
        dataType: "html",
    }).done(function(data)
    {
        $("#orders").html(data);
    }).fail(function(data)
    {

    });
}

function add_order_modal(){
    $.ajax({
        url: "/add_order_modal",
        method: "get",
        dataType: "html",
    }).done(function(data)
    {
        $("#modal").html(data);
    }).fail(function(data)
    {

    });
}

function add_order_valid()
{
    let id = $('#client_id').val();
    let name = $('#name').val();
    let phone = $('#phone').val();
    let items = $('#items').val();
    let total = $('#total').val();

    if(id > 0 && total > 0 && name != "" && phone != "" && items != "")
    {
        $('#btn').removeClass('disabled');
        $('#btn').attr('disabled', false);
    }
    else
    {
        $('#btn').addClass('disabled');
        $('#btn').attr('disabled', true);
    }
}

function add_order(){

    let id = $('#client_id').val();
    let name = $('#name').val();
    let phone = $('#phone').val();
    let items = $('#items').val();
    let total = $('#total').val();

    if(id > 0 && total > 0 && name != "" && phone != "" && items != "")
    {
        $.ajax({
            url: "/add_order",
            method: "post",
            dataType: "html",
            data: {id: id, total: total, name: name, phone: phone, items: items}
        }).done(function(data)
        {
            if(data > 0)
            {
                $('#add_order').modal('hide');
                orders_load();
            }
        }).fail(function(data)
        {

        });
    }

}

function order_set_value_text(id, type, value)
{
    $.ajax({
        url: "/order_set_value_text",
        method: "post",
        dataType: "html",
        data: {id: id, type: type, value: value}
    }).done(function(data)
    {
        console.log(data);
        if(data > 0)
        {
            if(type == 'hidden'){
                location.href = '/orders';
            }
            else {
                location.reload();
            }
        }
    }).fail(function(data)
    {

    });
}
