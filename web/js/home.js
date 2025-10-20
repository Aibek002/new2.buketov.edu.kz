const header = document.querySelector(".header");
const blurs = document.querySelector(".blur");
const more_events_overlay = document.querySelector(".more-events-overlay");

function openBox(element, type) {
  const box = document.querySelector(".box-overlay");
  box.innerHTML = ""; // Очищаем содержимое

  if (type === "open") {
    box.classList.add("active");
    blurs.classList.add("active");

    const title = element.dataset.title;
    const content = element.dataset.content;
    const date = element.dataset.date;
    const image = element.dataset.img;
    header.style.display = "none";
    box.innerHTML = `
        <div class="news-card p-4 rounded shadow-lg text-white" style="width: 100%; height: 100%; position: relative; background: linear-gradient(145deg, #1f3b6e, #2c5ca9); border: 1px solid rgba(255,255,255,0.2);">
                <!-- Кнопка закрытия -->
                <button onclick="closeBox('news')" style="position: absolute; top: 15px; right: 20px; font-size: 32px; background: none; border: none; color: white; cursor: pointer;">&times;</button>

                <div class="d-flex flex-column flex-md-row mt-4">
                    <!-- Текст -->
                    <div class="p-3 d-flex flex-column" style="flex: 2;">
                        <span class="mb-2" style="font-size: 14px; color: #e0e0e0;">📅 ${date}</span>
                        <h2 class="mb-3 fw-bold" style="font-size: 24px; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 8px;">📰 ${title}</h2>
                        <div class="card-text-news" style="font-size: 16px; font-family: 'Segoe UI', sans-serif; line-height: 1.7; overflow-y: auto; max-height: 300px;">
                            ${content}
                        </div>
                    </div>

                    <!-- Изображение -->
                    <div class="d-flex justify-content-center align-items-start px-3" style="flex: 1;">
                        <img src="/files/images/news/${image}" alt="Новость фото" style="max-width: 90%; min-height: 160px; object-fit: contain;">
                    </div>
                </div>
            </div>


        `;
  }
}
function openBoxEvents(element, type) {
  blurs.classList.add("active");
  more_events_overlay.classList.add("active");

  const title = element.dataset.title;
  const content = element.dataset.content;
  const day = element.dataset.time_events;
  header.style.display = "none";

  more_events_overlay.innerHTML = `
            <div class="event-modal p-5 rounded shadow-lg text-white" style="width: 100%; height: 100%; position: relative; background: linear-gradient(145deg, #274b7a, #2f5fa1); border: 2px solid #5c8ecb;">
                <!-- Кнопка закрытия -->
                <button onclick="closeBox('events')" style="position: absolute; top: 10px; right: 15px; font-size: 35px; background: none; border: none; color: white; cursor: pointer;">&times;</button>

                <!-- Основной блок -->
                <div class="d-flex flex-column h-100">
                    <div style="font-size: 16px; font-weight: 500; opacity: 0.85;">📅 ${day}</div>
                    <h2 class="my-3 fw-bold" style="font-size: 28px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 10px;">
                        📌 ${title}
                    </h2>
                    <div class="card-text-news" style="overflow-y: auto; font-family: 'Courier New', monospace; font-size: 16px; flex-grow: 1; line-height: 1.6;">
                        ${content}
                    </div>
                </div>
            </div>

    `;
}

function closeBox(type) {
  if (type == "news") {
    const box = document.querySelector(".box-overlay");
    box.classList.remove("active");
    blurs.classList.remove("active");
    header.style.display = "flex";
    box.innerHTML = "";
  } else if ((type = "events")) {
    more_events_overlay.classList.remove("active");
    header.style.display = "flex";
    more_events_overlay.innerHTML = "";
    blurs.classList.remove("active");
  }
}
const smi_short_title = document.querySelectorAll(".short-text");
const news_short_title = document.querySelectorAll(".upcoming-event-title");

smi_short_title.forEach((element) => {
  let text = element.textContent;
  if (text.length > 100) {
    element.innerHTML = text.substring(0, 100) + "...";
  }
});
news_short_title.forEach((element) => {
  console.log(element.textContent);
  let text = element.textContent;
  if (text.length > 50) {
    element.innerHTML = text.substring(0, 50) + "...";
  }
});
let currentPosition = 0;

function moveFaculty(type, length) {
  const container = document.querySelector(".faculty-container");
  const step = 900;
  const maxOfStep = -(length - step);
  leftBtn = document.querySelector(".moveLeftFaculty");
  rightBtn = document.querySelector(".moveRightFaculty");
  if (type === "left") {
    // Двигаемся вправо, если не в начале
    if (currentPosition < 0) {
      currentPosition += step;
    } else {
    }
  } else if (type === "right") {
    // Двигаемся влево, если не дошли до конца
    if (currentPosition > maxOfStep) {
      currentPosition -= step;
    } else {
    }
  }

  container.style.transform = `translateX(${currentPosition}px)`;
  container.style.transition = "transform 0.5s ease";
  leftBtn.disabled = currentPosition === 0;
  rightBtn.disabled = currentPosition <= maxOfStep;
  // 🔹 Изменяем стиль неактивных кнопок (по желанию)
  [leftBtn, rightBtn].forEach((btn) => {
    btn.style.opacity = btn.disabled ? "0.5" : "1";
    btn.style.cursor = btn.disabled ? "not-allowed" : "pointer";
  });
  console.log(`current: ${currentPosition}, max: ${maxOfStep}`);
}

function moveRatings(type, length) {
  const container = document.querySelector(".ratings-container");
  const step = 900;
  const maxOfStep = -(length - step);
  leftBtn = document.querySelector(".moveLeftRatings");
  rightBtn = document.querySelector(".moveRightRatings");
  if (type === "left") {
    // Двигаемся вправо, если не в начале
    if (currentPosition < 0) {
      currentPosition += step;
    } else {
    }
  } else if (type === "right") {
    // Двигаемся влево, если не дошли до конца
    if (currentPosition > maxOfStep) {
      currentPosition -= step;
    } else {
    }
  }

  container.style.transform = `translateX(${currentPosition}px)`;
  container.style.transition = "transform 0.5s ease";
  leftBtn.disabled = currentPosition === 0;
  rightBtn.disabled = currentPosition <= maxOfStep;
  // 🔹 Изменяем стиль неактивных кнопок (по желанию)
  [leftBtn, rightBtn].forEach((btn) => {
    btn.style.opacity = btn.disabled ? "0.5" : "1";
    btn.style.cursor = btn.disabled ? "not-allowed" : "pointer";
  });
  console.log(`current: ${currentPosition}, max: ${maxOfStep}`);
}
// === КОНФИГУРАЦИЯ БОТА ===
const RESPONSES = {
  START: {
    text: "Сәлеметсіз бе! Мен Сізге көмектесуге дайынмын. Сізді қандай сұрақтар қызықтырады? (Выберите интересующий Вас пункт)",
    menu: [
      { label: "ЕНТ/КТ", action: "ENT" },
      { label: "Специальности", action: "SPECIALTIES" },
      { label: "Общежитие", action: "DORMITORY" },
      { label: "Контакты", action: "CONTACTS" },
    ],
  },
  ENT: {
    text: "ЕНТ тапсыру туралы ақпарат алу үшін біздің 'ЕНТ бойынша іздеу' бөліміне өтіңіз. Басқа сұрақтар болса, тағы да пункт таңдаңыз. (Для информации о ЕНТ/КТ перейдите в раздел 'Поиск по ЕНТ' или выберите другой пункт)",
    menu: [
      { label: "Специальности", action: "SPECIALTIES" },
      { label: "Общежитие", action: "DORMITORY" },
      { label: "Вернуться к началу", action: "START" },
    ],
  },
  SPECIALTIES: {
    text: "Біздің университетте 40-тан астам мамандық бар. Барлық тізімді 'Специальности' бөлімінен көре аласыз. Оқыту тілі: қазақша/орысша. (У нас более 40 специальностей. Полный список доступен в разделе 'Специальности'.)",
    menu: [
      { label: "ЕНТ/КТ", action: "ENT" },
      { label: "Общежитие", action: "DORMITORY" },
      { label: "Вернуться к началу", action: "START" },
    ],
  },
  DORMITORY: {
    text: "Ия, біздің университетте қала сыртынан келген студенттерге жатақхана беріледі. Орын алу үшін өтінішті құжаттарды тапсыру кезінде жазу қажет. (Да, для иногородних студентов предоставляется общежитие. Заявление подается вместе с основными документами.)",
    menu: [
      { label: "ЕНТ/КТ", action: "ENT" },
      { label: "Специальности", action: "SPECIALTIES" },
      { label: "Вернуться к началу", action: "START" },
    ],
  },
  CONTACTS: {
    text: "Қабылдау комиссиясының байланыс деректері: \nТелефон: +7 7212 90 02 70 \nEmail: priemka@buketov.edu.kz \n(Приемная комиссия: +7 7212 90 02 70, priemka@buketov.edu.kz)",
    menu: [{ label: "Вернуться к началу", action: "START" }],
  },
};

const chatWindow = document.getElementById("chat-window");
const chatMenu = document.getElementById("chat-menu");

/**
 * Добавляет сообщение в окно чата.
 * @param {string} text - Текст сообщения.
 * @param {string} sender - Отправитель ('bot' или 'user').
 */
function displayMessage(text, sender) {
  const msgElement = document.createElement("div");

  // Заменяем переносы строк на <br> для корректного отображения
  const formattedText = text.replace(/\n/g, "<br>");

  msgElement.innerHTML = formattedText;
  msgElement.className = "chat-message";

  if (sender === "bot") {
    msgElement.classList.add("bot-message");
    msgElement.style.cssText = `
                    background-color: #f8f9fa; 
                    align-self: flex-start; 
                    margin-right: 20%; 
                    color: #333; 
                    font-size: 0.95rem; 
                    padding: 10px 15px; 
                    margin-bottom: 10px; 
                    border-radius: 15px 15px 15px 0;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                `;
  } else if (sender === "user") {
    msgElement.classList.add("user-message");
    msgElement.style.cssText = `
                    background-color: #d1e7dd; /* Light green */
                    align-self: flex-end; 
                    margin-left: 20%; 
                    color: #333; 
                    font-size: 0.95rem; 
                    padding: 10px 15px; 
                    margin-bottom: 10px; 
                    border-radius: 15px 15px 0 15px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                `;
  }

  chatWindow.appendChild(msgElement);
  // Прокрутка вниз
  chatWindow.scrollTop = chatWindow.scrollHeight;
}

/**
 * Обновляет кнопки меню в зависимости от текущего состояния.
 * @param {Array} menuItems - Массив объектов меню.
 */
function updateMenu(menuItems) {
  chatMenu.innerHTML = "";

  menuItems.forEach((item) => {
    const button = document.createElement("button");
    button.textContent = item.label;
    button.className = "menu-button";

    // Инлайн стили для кнопок меню
    button.style.cssText = `
                    background-color: #2c5ca9; /* Синий акцент */
                    color: white;
                    border: none;
                    padding: 8px 12px;
                    border-radius: 20px;
                    cursor: pointer;
                    font-size: 0.9rem;
                    font-weight: 500;
                    transition: all 0.2s;
                    flex-grow: 1; 
                `;

    button.onclick = () => handleUserInput(item.action, item.label);
    chatMenu.appendChild(button);
  });
}

/**
 * Обрабатывает выбор пользователя и вызывает ответ бота.
 * @param {string} action - Ключ действия (ENT, SPECIALTIES и т.д.).
 * @param {string} label - Текст кнопки, который нажал пользователь.
 */
function handleUserInput(action, label) {
  // 1. Показываем сообщение пользователя
  displayMessage(label, "user");

  // 2. Получаем ответ бота
  const response = RESPONSES[action];

  if (response) {
    // 3. Показываем сообщение бота
    setTimeout(() => {
      displayMessage(response.text, "bot");
      // 4. Обновляем меню для следующего шага
      updateMenu(response.menu);
    }, 500); // Небольшая задержка для имитации "думающего" бота
  } else {
    displayMessage(
      "Кешіріңіз, мен бұл сұрақты түсінбедім. Қайтадан таңдаңыз. (Извините, я не понял запрос. Начните сначала.)",
      "bot"
    );
    updateMenu(RESPONSES.START.menu);
  }
}

// === ИНИЦИАЛИЗАЦИЯ ЧАТА ===
function initChat() {
  // Начальное сообщение от бота
  displayMessage(RESPONSES.START.text, "bot");
  // Начальное меню
  updateMenu(RESPONSES.START.menu);
}

// Запускаем бота при загрузке страницы
window.onload = initChat;
