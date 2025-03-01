$("body").on('click','.btn-delete',function(){

    var param           = $(this).data("param");
    var Id              = $(this).data("itemid");
    var compare         = $(this).data("compare");

    $("#param").val(param);
    $("#itemid").val(Id);
    $("#compare").val(compare);

    $("#modalDeleteConfirmation").modal('toggle');
    $("#tex_warning_delete").html("¿Seguro que desea eliminar?");

});

$("body").on('click','.btn_confirm_delete',function(){

    var param           = $("#param").val();
    var Id              = $("#itemid").val();
    var compare         = $("#compare").val();

    var dataString  = {"table" : param,"id" : Id,"compare":compare};
    $.ajax({
        type: "POST",
        url: "/DeleteGeneral",
        data: dataString,
        success: function(data) {
            var response = JSON.parse(data);

            if (response.status == "success") {
                $("#modalDeleteConfirmation").modal('hide');
                $("#modalSuccess").modal('toggle');
                $("#form_delete")[0].reset();
                var validator = $("#form_delete").validate();
                validator.resetForm();
                getLoadData();
            }
            else{
                $("#modalError").modal('toggle');
                $("#errordescription").html(response.Description);
            }
        }
    });

});