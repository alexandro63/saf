$(document).ready(function () {
    var rolesTable = $("#roles_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "roles",
            type: "GET",
        },
        columns: [
            { data: "name"},
            { data: "action", orderable: false, searchable: false },
        ],
    });

    registerAjaxForm("form#add_role", "div.modal_role", rolesTable);

    updateAjaxForm(
        "form#edit_role",
        "button.edit_role",
        "div.modal_role",
        rolesTable
    );

    deleteAjaxConfirmation({
        selector: "button.delete_role",
        table: rolesTable,
    });

    $('div.modal_role').on('show.bs.modal', function () {
        const modal = $(this);
        modal.find('#select_all').off('change').on('change', function () {
            const isChecked = $(this).is(':checked');
            modal.find('.form-check-input').prop('checked', isChecked);
        });
    });

});
