/**
 * Add 'delete' button click handler,
 * call delete element,
 * remove item row from list,
 * show alert with result message.
 */
jQuery(document).ready(function () {
    $("button[del-url").on('click', function (event) {
        event.preventDefault();

        let url = $(this).attr('del-url');

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
                    $("button[del-url='" + url + "']").closest('tr').remove();
                }
                alert(data.msg);
            },

            error: function (data) {
                alert(data.message.message);
            }

        });

        return false;
    });
});
