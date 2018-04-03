$("#level").change(event=>{
    $.get(`/admin/level_parents/${event.target.value}`,function (response,state) {
        $("#parent_id").empty();
        $("#parent_id").append(` <option value="">Seleccione un area</option>`);
        response.forEach(element => {
            $("#parent_id").append(`<option value=${element.id}>${element.name}</option>`);
        });
    });
});