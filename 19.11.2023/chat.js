$(document).ready(function() {
    // Pobierz wiadomości przy starcie
    getMessages();

    // Obsłuż formularz
    $('#chat-form').submit(function(e) {
        e.preventDefault();

        // Pobierz dane z formularza
        var name = $('#login').val(); // Przyjmuję, że masz pole o id 'login'
        var message = $('#message').val();

        // Wyślij wiadomość
        sendMessage(name, message);

        // Wyczyść pole tekstowe po wysłaniu wiadomości
        $('#message').val('');
    });

    function getMessages() {
        $.ajax({
            url: 'chat.php?action=get',
            type: 'GET',
            success: function(response) {
                displayMessages(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function sendMessage(name, message) {
        $.ajax({
            url: 'chat.php?action=send',
            type: 'POST',
            data: {name: name, message: message},
            success: function(response) {
                getMessages(); 
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function displayMessages(messages) {
        var chatMessages = $('#chat-messages');
        chatMessages.empty();

        messages.forEach(function(msg) {
            var messageHTML = '<div><strong>' + msg.name + ':</strong> ' + msg.message + '</div>';
            chatMessages.append(messageHTML);
        });
    }

    setInterval(function() {
        getMessages();
    }, 1000);
});
