(function() {

    /** Event Handlers **/
    $.each($('button.delete-client'), function(key, $button) {
        $button.addEventListener('click', onDeleteClientButtonClick, false);
    });

    /** Delete a client **/
    function onDeleteClientButtonClick(e) {
        e.preventDefault();

        var deleteId = parseInt($(this).closest('tr').data('client-id'));

        /** Disabling inspections for PHPStorm with 'noinspection' **/
        if (deleteId !== 0)
        {
            $(this).prop('disabled', true);

            // noinspection JSUnresolvedFunction, JSUnresolvedVariable
            $.ajax({
                context:  this,
                type:     'POST',
                url:      removeClientUrl,
                data:     { id: deleteId }
            }).always(function() {
                /** We'll show any errors via the flashbag server-side **/
                location.reload();
            });
        }
    }

})();