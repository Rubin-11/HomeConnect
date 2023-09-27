
export default function useChat() {
     Echo.private(`chat`)
        .listen('MessageSent', (e) => {
            console.log(e.messages);
            alert('vfvfdvdf');
        });
}
