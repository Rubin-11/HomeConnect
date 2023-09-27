import './bootstrap';
import './composables/chat';

import { createApp } from 'vue';
import ChatForm from "./components/ChatForm.vue";
import ChatMessages from "./components/ChatMessages.vue";
import useChat from "./composables/chat";

const app =createApp({
    components: {
        ChatForm,
        ChatMessages,
    }
});

useChat();

app.mount('#app');
