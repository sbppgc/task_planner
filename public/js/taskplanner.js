/**
 * Add 'delete' button click handler,
 * call delete element,
 * remove item row from list,
 * show alert with result message.
 */
jQuery(document).ready(function () {
    $("button[data-del-url").on('click', function (event) {
        event.preventDefault();

        const confirmText = $(this).attr('data-confirm-text') || 'Are you sure?';

        if (confirm(confirmText)) {

            const url = $(this).attr('data-del-url');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "JSON",

                success: function (data) {
                    if (data.code == 0) {
                        $("button[data-del-url='" + url + "']").closest('tr').remove();
                    }
                    alert(data.msg);
                },

                error: function (data) {
                    alert(data.message.message);
                }

            });
        }

    });
});


/**
 * Add 'add' button click handler,
 * request form,
 * show dialog with form,
 */
jQuery(document).ready(function () {
    ajaxFormStuff.init();
});


/**
 * Ajax forms show/submit logic
 */
ajaxFormStuff = {

    /**
     * jBox modals objects for forms
     */
    formPopups: [],

    /**
     * jBox modal window object for result
     */
    resultPopup: null,

    /**
     * Collect buttons, that opens forms. Init jBox modals for each form and attach to buttons.
     * Also init result close button
     */
    init: function () {

        var btnIndex = 0;

        $('button[data-form-url]').each(function () {

            const url = $(this).attr('data-form-url') || '';
            const title = $(this).attr('data-dlg-title') || '';

            if (url != '') {

                const btnId = 'jbox' + btnIndex;
                btnIndex++;

                $(this).attr('data-btn-id', btnId);

                ajaxFormStuff.formPopups.push(
                    new jBox('Modal', {
                        attach: $(this),
                        title: title,
                        width: 500,
                        responsiveWidth: true,
                        ajax: {
                            url: url,
                            reload: false,
                            setContent: false,
                            success: function (response) {
                                this.setContent(response);
                                ajaxFormStuff.initForm();
                            },
                            error: function () {
                                this.setContent('<b style="color: #d33">Error loading form.</b>');
                            }
                        }
                    })
                );

            }

        });

        // Init result close button
        $('#resultBoxCloseBtn').on('click', function () {
            ajaxFormStuff.closeResultPopup();
        });

    },

    /**
     * Init form after open popup and load form (add close button and submit handlers)
     */
    initForm: function () {

        const form = $(".jBox-container form");

        if (form.length) {

            $(form).find("button[data-purpose=cancel]").on('click', function (event) {
                ajaxFormStuff.closeFormPopup();
            });

            $(form).on('submit', function (event) {
                event.preventDefault();
                ajaxFormStuff.cmdSubmitForm();
                return false;
            });
        }

    },

    /**
     * Close modal window with form (no matter which window is open)
     */
    closeFormPopup: function () {
        if (this.formPopups.length) {
            for (var i = 0, iMax = this.formPopups.length; i < iMax; i++) {
                this.formPopups[i].close();
            }
        }
    },

    /**
     * Close modal window with results
     */
    closeResultPopup: function () {
        if (this.resultPopup != null) {
            this.resultPopup.close();
        }
    },

    /**
     * Submit form
     */
    cmdSubmitForm: function () {

        const form = $(".jBox-container form");

        if (form.length) {

            const url = $(form).attr('action');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const data = $(form).serialize();
            const type = $(form).attr('data-method');
            $.ajax({
                url: url,
                type: type,
                data: data,

                success: function (data) {
                    //console.log('success data', data);
                    if (data.code == 0) {
                        ajaxFormStuff.cmdShowSubmitResultForm(data.msg);
                    }
                },

                error: function (data) {
                    console.log('error data', data);
                }

            });

        }

    },

    /**
     * Show window with result message
     */
    cmdShowSubmitResultForm: function (msg) {

        this.closeFormPopup();

        $('#resultBoxMsg').html(msg);

        this.resultPopup = new jBox('Modal', {
            content: $('#resultBox'),
            onClose: function () {
                document.location.reload();
            }
        });

        this.resultPopup.open();

    }
}
