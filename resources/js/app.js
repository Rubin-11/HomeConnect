import './bootstrap';

const app =createApp({
    components: {
        ChatForm,
        ChatMessages,
    }
});

useChat();

app.mount('#app');
