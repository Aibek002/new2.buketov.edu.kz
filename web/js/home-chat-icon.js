const chat_open_btn = document.querySelector(".chat-open");
let index = 0;
let close_index = 0;

const icons = [
  "https://www.shutterstock.com/image-vector/chat-bot-icon-virtual-smart-600nw-2478937553.jpg",
  "https://avatars.mds.yandex.net/i?id=813b2070e81414b4326f00a8c21f6d46bab23041-10194750-images-thumbs&n=13",
];

const color = ["white", "#2c5ca9"];
// const whatsapp = document.querySelector(".chat-whatsapp");
const phone = document.querySelector(".chat-phone");
const chat_bot_btn = document.querySelector(".chat-bot");
const chat_bot_btn2 = document.querySelector(".chat-bot2");

const close_btn = document.querySelector(".close_chat_bot");
const close_btn2 = document.querySelector(".close_chat_bot2");

let closeInterval = null;
const chat_box = document.querySelector(".chat-box");
const chat_box2 = document.querySelector(".chat-widget");
const icon_close_chat = [
  "https://cb-electronics.com/wp-content/uploads/2021/04/istockphoto-1221348467-612x612-1.jpeg",
  "https://icons.veryicon.com/png/o/miscellaneous/all-blue-icon/close-428.png",
];

setInterval(() => {
  index = (index + 1) % icons.length;
  chat_open_btn.style.backgroundImage = `url(${icons[index]})`;
  chat_open_btn.style.backgroundSize = "cover";
  chat_open_btn.style.setProperty("--indigoblue-font", color[index]);
}, 3000);

chat_open_btn.addEventListener("click", () => {
  chat_bot_btn.classList.add("active");
  chat_bot_btn2.classList.add("active");

  // phone.classList.toggle("active");
  // whatsapp.classList.toggle("active");
});

chat_bot_btn.addEventListener("click", () => {
  // phone.classList.remove("active");
  // whatsapp.classList.remove("active");
  chat_open_btn.classList.remove("active");
  chat_bot_btn.classList.remove("active");
  chat_bot_btn2.classList.remove("active");
  chat_box.classList.add("active");
  if (chat_box.classList.contains("active") && close_btn) {
    if (closeInterval) clearInterval(closeInterval);
    closeInterval = setInterval(() => {
      close_index = (close_index + 1) % icon_close_chat.length;
      close_btn.style.backgroundImage = `url(${icon_close_chat[close_index]})`;
      close_btn.style.backgroundSize = "cover";
    }, 1000);
  }
  close_btn.addEventListener("click", () => {
    chat_box.classList.remove("active");
    chat_open_btn.classList.add("active");
  });
});
chat_bot_btn2.addEventListener("click", () => {
  // phone.classList.remove("active");
  // whatsapp.classList.remove("active");
  chat_open_btn.classList.remove("active");
  chat_bot_btn.classList.remove("active");
  chat_bot_btn2.classList.remove("active");
  chat_box2.classList.add("active");
  if (chat_box2.classList.contains("active") && close_btn) {
    if (closeInterval) clearInterval(closeInterval);
    closeInterval = setInterval(() => {
      close_index = (close_index + 1) % icon_close_chat.length;
      close_btn.style.backgroundImage = `url(${icon_close_chat[close_index]})`;
      close_btn.style.backgroundSize = "cover";
    }, 1000);
  }
  close_btn2.addEventListener("click", () => {
    chat_box2.classList.remove("active");
    chat_open_btn.classList.add("active");
  });
});
const input = document.querySelector(".input-message");
const submit_msg = document.querySelector(".chat-submit");
const messageBox = document.querySelector(".messages");

function sendMessage() {
  const inputValue = input.value.trim();
  if (inputValue === "") return;

  // Показываем сообщение пользователя
  messageBox.innerHTML += `<div class="message user">${inputValue}</div>`;

  // Очищаем инпут
  input.value = "";

  // Отправка на сервер
  fetch(
    `/yii2/web/index.php?r=ajax%2Fchat-bot&message=${encodeURIComponent(
      inputValue
    )}`
  )
    .then((response) => response.json())
    .then((data) => {
      const rawText =
        data.candidates?.[0]?.content?.parts?.[0]?.text || "Ошибка AI";

      // Преобразуем markdown
      let formattedText = rawText
        .replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>") // жирный
        .replace(/\*(.*?)\*/g, "<em>$1</em>"); // курсив

      // Списки
      const listItems = formattedText.match(/^(?:- |\* )(.*)$/gm);
      if (listItems) {
        const listHtml = listItems
          .map((item) => `<li>${item.replace(/^- |\* /, "")}</li>`)
          .join("");
        formattedText = formattedText.replace(/^(?:- |\* ).*$/gm, ""); // удаляем исходные строки
        formattedText += `<ul>${listHtml}</ul>`;
      }

      // Добавляем ответ бота
      messageBox.innerHTML += `<div class="message bot">${formattedText}</div>`;

      // Скролл вниз
      messageBox.scrollTop = messageBox.scrollHeight;
    })
    .catch((err) => {
      console.error(err);
      messageBox.innerHTML += `<div class="message bot">Ошибка при отправке запроса</div>`;
    });
}

// Отправка по клику на кнопку
submit_msg.addEventListener("click", sendMessage);

// Отправка по нажатию Enter
input.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    event.preventDefault(); // чтобы не было перехода на новую строку
    sendMessage();
  }
});
