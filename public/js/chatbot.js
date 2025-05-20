document.addEventListener('DOMContentLoaded', () => {
  const circle     = document.getElementById('chatbot-circle');
  const widget     = document.getElementById('chatbot-widget');
  const messagesEl = document.getElementById('chatbot-messages');
  const inputEl    = document.getElementById('chatbot-input');
  const sendBtn    = document.getElementById('chatbot-send');

  // Oculta widget al inicio
  widget.style.display = 'none';

  // Abrir / cerrar widget
  circle.addEventListener('click', () => {
    widget.style.display = widget.style.display === 'none' ? 'flex' : 'none';
    if (widget.style.display === 'flex') {
      inputEl.focus();
    }
  });

  // Función para renderizar un mensaje
  function renderMessage(text, fromUser = true) {
    const msg = document.createElement('div');
    msg.className = fromUser
      ? 'self-end bg-indigo-100 text-indigo-900 px-3 py-2 rounded-lg my-1 max-w-xs'
      : 'self-start bg-gray-100 text-gray-900 px-3 py-2 rounded-lg my-1 max-w-xs';
    msg.textContent = text;
    messagesEl.appendChild(msg);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  // Lógica para enviar mensaje al backend
  function sendMessage(text) {
    if (!text.trim()) return;
    renderMessage(text, true);
    inputEl.value = '';

    fetch(chatbotConfig.endpoint, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept':       'application/json',
        'X-CSRF-TOKEN': chatbotConfig.csrfToken
      },
      body: JSON.stringify({ message: text })
    })
    .then(res => res.json())
    .then(res => {
      if (res.type === 'redirect') {
        renderMessage('🔗 Redirigiendo...', false);
        setTimeout(() => window.location.href = res.url, 500);
      } else {
        renderMessage(res.message, false);
      }
    })
    .catch(err => {
        console.error('Chatbot fetch error:', err);
        renderMessage('Error de conexión. Intenta de nuevo.', false);
    });
  }

  // Envío al pulsar Enter
  inputEl.addEventListener('keydown', e => {
    if (e.key === 'Enter') {
      e.preventDefault();
      sendMessage(inputEl.value);
    }
  });

  // Envío al hacer click en botón
  sendBtn.addEventListener('click', () => {
    sendMessage(inputEl.value);
  });
});
