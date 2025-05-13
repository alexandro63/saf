$(document).ready(function () {
    var adminsitrativeTable = $("#administrative_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "administrative",
            type: "GET",
        },
        columns: [
            { data: "name" },
            { data: "action", orderable: false, searchable: false },
        ],
    });

    registerAjaxForm("form#add_administrative", "div.modal_administrative", adminsitrativeTable);

    updateAjaxForm(
        "form#edit_administrative",
        "button.edit_administrative",
        "div.modal_administrative",
        adminsitrativeTable
    );

    deleteAjaxConfirmation({
        selector: "button.delete_administrative",
        table: adminsitrativeTable,
    });

    stepFormModal("div.modal_administrative");

});
