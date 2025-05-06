$(document).ready(function () {
    var subjectsTable = $("#subjects_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "subjects",
            type: "GET",
        },
        columns: [
            { data: "user_name" },
            { data: "per_id" },
            { data: "status" },
            { data: "action", orderable: false, searchable: false },
        ],
    });
    registerAjaxForm("form#add_subject", "div.modal_subject", subjectsTable);

    updateAjaxForm(
        "form#edit_subject",
        "button.edit_subject",
        "div.modal_subject",
        subjectsTable
    );

    deleteAjaxConfirmation({
        selector: "button.delete_subject",
        table: subjectsTable,
    });

    $("div.modal_subject").on("show.bs.modal", function () {
        $("#per_id").select2({
            dropdownParent: $("div.modal_subject"),
            width: "100%",
            placeholder: LANG.select,
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: "/registration/get-degrees",
                type: "GET",
                dataType: "json",
                delay: 250,
                data: (params) => ({
                    term: params.term,
                    page: params.page || 1,
                }),
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    const formatted = data.data.map((item) => ({
                        id: item.per_id,
                        text:
                            "( C.I. " +
                            item.per_ci +
                            ") " +
                            item.per_nombres +
                            " " +
                            item.per_apellidopat,
                    }));
                    return {
                        results: formatted,
                        pagination: {
                            more: data.last_page > params.page,
                        },
                    };
                },
                cache: true,
                error: () => console.error("Fallo al cargar datos"),
            },
        });
    });
});
