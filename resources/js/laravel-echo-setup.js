import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: 'socket.io-client',
    host: window.location.hostname + " : " + window.laravel_echo_port
})
