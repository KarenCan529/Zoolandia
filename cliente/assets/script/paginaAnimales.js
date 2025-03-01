
$(document).ready(function(){
    // Filtrar animales según la taxonomía (al hacer clic en los botones)
    $(".botonesDentro").click(function(){
        var taxonomia = $(this).data("taxonomia");
        window.location.href = "?taxonomia=" + taxonomia;
    });

    // Búsqueda de animales
    $("#buscarInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#animalesContainer .seccionAnimal1").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
