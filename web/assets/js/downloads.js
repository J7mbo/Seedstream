(function() {

    /**
     * @type Websocket websocket
     */
    var websocket = websockets.use();

    websocket.subscribe(
        'torrents',
        onSuccess = function(subscription, data) {
            console.log('success');
            console.log(subscription);
            console.log(data);
        }, onFailure = function() {
            console.log('failure');
        }
    );
})();