<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
    <div id="chat">
        <ul id="messages"></ul>
        <form id="message-form">
            <input type="text" id="message-input">
            <select id="recipient">
                <option value="user1">User 1</option>
                <option value="user2">User 2</option>
                <option value="user3">User 3</option>
            </select>
            <button type="submit">Send</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const messageForm = document.getElementById('message-form');
        const messageInput = document.getElementById('message-input');
        const recipientSelect = document.getElementById('recipient');
        const messages = document.getElementById('messages');

        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = messageInput.value;
            const recipient = recipientSelect.value;
            axios.post('/send-message', { message, recipient })
                .then(response => {
                    messageInput.value = '';
                });
        });

        Echo.private(`chat.${recipientSelect.value}`)
            .listen('MessageSent', (e) => {
                const message = document.createElement('li');
                message.textContent = e.message;
                messages.appendChild(message);
            });
    </script>
</body>
</html>
