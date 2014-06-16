/**
 * Class used for the construction and manipulation of Websocket sessions
 *
 * Requires AutobahnJS / WhenJS for websocket connection / promises
 * Requires twitter bootstrap for icon / notify styling
 * Requires jQuery for animations
 */

/** Namespaces **/
var Websocket = {};

(function() {
    
    "use strict";
    
    var setNotificationElement = Websocket.setNotificationElement,
        subscribe = Websocket.subscribe,
        notify = Websocket.notify,
        call = Websocket.call,
        notificationElement,
        userId,
        token,
        uri;
    
    /** 
     * Websocket Constructor 
     * 
     * @param {string} uri    URI for websocket connection
     * @param {string} userId UserId for authentication
     * @param {string} token  Token for authentication
     */
    Websocket = function(uri, userId, token) {
        this.uri = uri;
        this.userId = userId;
        this.token = token;
    };
    
    /** 
     * Set notification element 
     * 
     * @param {string} elementId The ElementId to use for notifications
     * 
     * @return {Websocket} Instance of self for method chaining
     */
    Websocket.prototype.setNotificationElement = function(elementId) {
        this.notificationElement = elementId;
        
        return this;
    };
    
    /** 
     * Update token
     * 
     * This may be required if your application updates a user's token
     * automatically on every request, and you want to send a POST request
     * on the same page as making websocket RPC calls
     * 
     * @param {string} token The new websocket token for future calls
     * 
     * @return {Websocket} Instance of self for method chaining
     */
    Websocket.prototype.setToken = function(token) {
        this.token = token;
        
        return this;
    };
    
    /** 
     * Notifier
     * 
     * Constructs a new element if one doesn't exist with custom jQuery anims
     * 
     * @param {string} type    Notification type in ('warning', 'danger', 'info')
     * @param {string} title   Message title, with emphasis
     * @param {string} message Message to be displayed
     * @param {string} icon    The icon to be used (see bootstrap icons)
     * 
     * @return {Websocket} Instance of self for method chaining
     */
    Websocket.prototype.notify = function(type, title, message, icon) {
        var notifier = this.notificationElement;
        
        if ($('#' + notifier).length >= -1) {
            $('#' + notifier).hide().html(
                "<div class='alert alert-" + type + "'>" +
                "<i class='icon icon-" + icon + "'></i> <strong>" + title + ":</strong> " + message
            ).fadeIn('slow', function() {
                setTimeout(function() {
                    $('#' + notifier).fadeOut('slow'); 
                }, 4000);
            });
        }
        
        return this;
    };
    
    /** 
     * Subscribe to a channel
     * 
     * @param {string}   topic   The topic you wish to subscribe to
     * @param {function} onSuccess Callback function on data retrieval success
     * @param {function} onFailure Callback function when connection goes down
     *  
     * @return {void}
     */
    Websocket.prototype.subscribe = function(topic, onSuccess, onFailure) {
        var session = null;
        var topic = JSON.stringify({topic: topic, userId: this.userId, token: this.token});

        ab.connect(this.uri,
            function (newSession) {
                session = newSession;
                session.subscribe(topic, function(subscription, data) {
                     if (typeof onSuccess === 'function') onSuccess(subscription, data);
                });
            },
            function (code, reason) {
                if (typeof onFailure === 'function') onFailure();
            }, 
            { 'skipSubprotocolCheck': true }
        );
    };
    
    /**
     * Send an RPC call
     * 
     * @param {string}   topic   The topic you wish to subscribe to
     * @param {string}   torrentId The ID of the torrent to make a call to
     * @param {function} onSuccess Callback function on data retrieval success
     * @param {function} onFailure Callback function when connection goes down
     *  
     * @return {void} 
     */
    Websocket.prototype.call = function(topic, torrentId, onSuccess, onFailure) {
        var topic = JSON.stringify({topic: topic, userId: this.userId, torrentId: torrentId, token: this.token});
        
        ab.connect(this.uri,
            function (session) {
                session.call(topic, Math.floor(Math.random()*1000)).then(
                    function (res) {
                        if (typeof onSuccess === 'function') onSuccess(res);
                    },
                    function (error, desc) { 
                        if (typeof onFailure === 'function') onFailure(error, desc);
                    }
                );
            },
            function (code, reason) {
                if (typeof onFailure === 'function') onFailure(code, reason);
            },
            { 'skipSubprotocolCheck': true }
         );
    };

}());