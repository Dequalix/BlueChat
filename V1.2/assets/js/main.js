$(document).ready(function () {
    var chatInterval = 250; //refresh interval in ms
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        var chatInputString = $chatInput.val();

        $.get("./write.php", {
            message: chatInputString
        });
        
        $chatInput.val("");
        retrieveMessages();
    }

    function retrieveMessages() {
        $.get("./read.php", function (data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }

    $chatSend.click(function () {
        sendMessage();
    });
    
    $("#chatInput").on('keydown', function (e) {
    if (e.keyCode == 13) {
        sendMessage();
    }
    });

    setInterval(function () {
        retrieveMessages();
    }, chatInterval);
});