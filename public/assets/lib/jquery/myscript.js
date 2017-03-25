$(document).ready(function() {
    $(".updatecart").click(function() {
        var rowId = $(this).attr('id');
        var qty = $(this).parent().parent().find('.form-control.input-sm').val();
        var token = $("input[name = '_token']").val();
        $.ajax({
            url: 'cap-nhat-gio-hang/' + rowId + '/' + qty,
            type: 'GET',
            cache: false,
            data: {
                "_token": token,
                "id": rowId,
                "qty": qty
            },
            success: function(data) {
                if (data == "oke") {
                    window.location = "gio-hang"
                }
            }
        });
    });
});