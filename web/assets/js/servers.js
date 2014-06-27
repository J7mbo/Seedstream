(function() {

    /** Event Handlers **/
    $.each($('button.delete-client'), function(key, $button) {
        $button.addEventListener('click', onDeleteClientButtonClick, false);
    });

    $.each($('.add-server-btn'), function(key, $button) {
        $button.addEventListener('click', onAddNewServerButtonClick, false);
    });

    /** **/
    function onAddNewServerButtonClick(e) {
        e.preventDefault();


    }

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
            }).done(function(data) {
                console.log(data);
                // @todo Add 'undo' link, bar etc
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                // @todo Notify something went wrong and to refresh / try again
            }).always(function() {
                $(this).prop('disabled', false);
            });
        }
    }

})();