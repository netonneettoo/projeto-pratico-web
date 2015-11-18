var notify;
var notifyOnlyMessage;
var notifyOnlyMessageFast;

$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    notify = function(title, msg, type, icon) {
        new PNotify({
            title: title,
            text: msg,
            type: type,
            icon: icon,
            opacity: .8,
            delay: 4000
        });
    };

    notifyOnlyMessage = function(msg, type) {
        new PNotify({
            text: msg,
            type: type,
            icon: null,
            opacity: .8,
            delay: 4000
        });
    };

    notifyOnlyMessageFast = function(msg, type) {
        new PNotify({
            text: msg,
            type: type,
            icon: null,
            opacity: .8,
            delay: 1000
        });
    };

});