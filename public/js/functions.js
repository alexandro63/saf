/**
 * Registra el manejo AJAX + validación para cualquier formulario.
 *
 * @param {string} formSelector   — Selector del <form> a interceptar (p.ej. 'form#add_user')
 * @param {string} [modalSelector] — Selector del contenedor modal a cerrar tras el éxito (p.ej. 'div.modal_user')
 * @author Ing Alexandro Fuentelsaz
 */

/**DISABLED BUTTON SUBMIT */
function __disable_submit_button(element) {
    element.attr("disabled", "disabled");
    element.html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...'
    );
}

/**NOTIFICATION */
function notify(type = "default", message, timer) {
    const defaults = {
        success: "Éxito",
        danger: "Error",
        warning: "Advertencia",
        info: "Información",
        default: "Notificación",
    };

    const iconMap = {
        success: "fa fa-check",
        danger: "fa fa-times",
        warning: "fa fa-exclamation",
        info: "fa fa-info-circle",
        default: "fa fa-bell",
    };

    const state = type.toLowerCase();
    const title = defaults[state] || defaults.default;
    const icon = iconMap[state] || iconMap.default;

    $.notify(
        {
            title: title,
            message: message,
            icon: icon,
        },
        {
            type: state,
            allow_dismiss: false,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right",
            },
            delay: 1000,
            timer: timer ?? 1000,
        }
    );
}

/**CREATE REGISTER IN MODAL */
function registerAjaxForm(formSelector, modalSelector, table) {
    $(document).on("submit", formSelector, function (e) {
        e.preventDefault();
        var $form = $(this),
            valid = true;

        $form
            .find(".form-group.required")
            .removeClass("has-error")
            .find(".help-block")
            .hide();

        $form.find(".required :input").each(function () {
            const $input = $(this);
            const tag = $input.prop("tagName").toLowerCase();
            const type = $input.attr("type");

            let value = $input.val();
            let inputValid = true;

            if (Array.isArray(value)) {
                value = value.length ? value.join(",") : "";
            }

            if (tag === "select") {
                if (!value || value === "") {
                    inputValid = false;
                }
            } else if (
                type === "text" ||
                type === "date" ||
                type === undefined
            ) {
                if (!value || value.toString().trim() === "") {
                    inputValid = false;
                }
            }

            const $grp = $input.closest(".form-group");
            if (!inputValid) {
                $grp.addClass("has-error").find(".help-block").show();
                valid = false;
            } else {
                $grp.removeClass("has-error").find(".help-block").hide();
            }
        });

        if (!valid) {
            notify("warning", "Por favor, llene los campos requeridos.");
            return;
        }

        $.ajax({
            type: "POST",
            url: $form.attr("action"),
            data: $form.serialize(),
            dataType: "json",
            beforeSend: function () {
                __disable_submit_button($form.find('button[type="submit"]'));
            },
            success: function (res) {
                if (res.success) {
                    if (modalSelector) {
                        $(modalSelector).modal("hide");
                    }
                    $form.find('button[type="submit"]').attr("disabled", false);
                    $form[0].reset();
                    notify("success", res.msg);
                    table.ajax.reload();
                } else {
                    notify("danger", res.msg);
                }
            },
            error: function (xhr) {
                var listMsg =
                    "<strong>Corrige los siguientes campos:</strong><ul>";
                var errors = xhr.responseJSON.errors;
                var $submitBtn = $form.find('button[type="submit"]');
                $submitBtn.removeAttr("disabled");
                $submitBtn.html("Guardar");
                $form
                    .find(".form-group")
                    .removeClass("has-error")
                    .find(".help-block");
                $.each(errors, function (field, messages) {
                    var $field = $form.find('[name="' + field + '"]');

                    $field
                        .closest(".form-group")
                        .addClass("has-error")
                        .find(".help-block")
                        .show();

                    listMsg += `<li>${messages}</li>`;
                });
                listMsg += "</ul>";
                notify("warning", listMsg, 2000);
            },
        });
    });
}
/**EDIT REGISTER IN MODAL */
function updateAjaxForm(formSelector, buttonSelector, modalSelector, table) {
    $(document).on("click", buttonSelector, function () {
        $(modalSelector).load($(this).data("href"), function () {
            $(this).modal("show");

            $(formSelector).submit(function (e) {
                e.preventDefault();
                var $form = $(this),
                    valid = true;

                $form
                    .find(".form-group.required")
                    .removeClass("has-error")
                    .find(".help-block")
                    .hide();

                $form.find(".required :input").each(function () {
                    const $input = $(this);
                    const tag = $input.prop("tagName").toLowerCase();
                    const type = $input.attr("type");

                    let value = $input.val();
                    let inputValid = true;

                    if (Array.isArray(value)) {
                        value = value.length ? value.join(",") : "";
                    }

                    if (tag === "select") {
                        if (!value || value === "") {
                            inputValid = false;
                        }
                    } else if (
                        type === "text" ||
                        type === "date" ||
                        type === undefined
                    ) {
                        if (!value || value.toString().trim() === "") {
                            inputValid = false;
                        }
                    }

                    const $grp = $input.closest(".form-group");
                    if (!inputValid) {
                        $grp.addClass("has-error").find(".help-block").show();
                        valid = false;
                    } else {
                        $grp.removeClass("has-error")
                            .find(".help-block")
                            .hide();
                    }
                });

                if (!valid) {
                    notify(
                        "warning",
                        "Por favor, llene los campos requeridos."
                    );
                    return;
                }

                $.ajax({
                    method: "POST",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: $form.serialize(),
                    beforeSend: function () {
                        __disable_submit_button(
                            $form.find('button[type="submit"]')
                        );
                    },
                    success: function (res) {
                        if (res.success) {
                            $(modalSelector).modal("hide");
                            notify("success", res.msg);
                            table.ajax.reload();
                        } else {
                            notify("error", res.msg);
                        }
                    },
                    error: function (xhr) {
                        var listMsg =
                            "<strong>Corrige los siguientes campos:</strong><ul>";
                        var errors = xhr.responseJSON.errors;
                        var $submitBtn = $form.find('button[type="submit"]');
                        $submitBtn.removeAttr("disabled");
                        $submitBtn.html("Guardar");
                        $form
                            .find(".form-group")
                            .removeClass("has-error")
                            .find(".help-block");
                        $.each(errors, function (field, messages) {
                            var $field = $form.find('[name="' + field + '"]');

                            $field
                                .closest(".form-group")
                                .addClass("has-error")
                                .find(".help-block")
                                .show();

                            listMsg += `<li>${messages}</li>`;
                        });
                        listMsg += "</ul>";
                        notify("warning", listMsg, 2000);
                    },
                });
            });
        });
    });
}

/**DELETED REGISTER ALERT*/
function deleteAjaxConfirmation({ selector, table = null }) {
    $(document).on("click", selector, function () {
        const $button = $(this);
        swal({
            title: LANG.sure_deleted,
            text: LANG.text_deleted,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                const href = $button.data("href");
                const data = $button.serialize();

                $.ajax({
                    method: "DELETE",
                    url: href,
                    dataType: "json",
                    data: data,
                    success: function (result) {
                        if (result.success === true) {
                            notify("success", result.msg);
                            if (table) {
                                table.ajax.reload();
                            }
                        } else {
                            notify("danger", result.msg);
                        }
                    },
                });
            }
        });
    });
}
