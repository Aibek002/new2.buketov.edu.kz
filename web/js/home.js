const header = document.querySelector('.header')
const blurs = document.querySelector('.blur');
const more_events_overlay = document.querySelector('.more-events-overlay');

function openBox(element, type) {
    const box = document.querySelector('.box-overlay');
    box.innerHTML = ""; // Очищаем содержимое

    if (type === 'open') {
        box.classList.add('active');
        blurs.classList.add('active');

        const title = element.dataset.title;
        const content = element.dataset.content;
        const date = element.dataset.date;
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
                        <img src="https://e.buketov.edu.kz/img/logo_ksu.png" alt="Новость" style="max-width: 100%; max-height: 160px; object-fit: contain;">
                    </div>
                </div>
            </div>


        `;
    }
}
function openBoxEvents(element, type) {
    blurs.classList.add('active')
    more_events_overlay.classList.add('active')

    const title = element.dataset.title;
    const content = element.dataset.content;
    const day = element.dataset.day;
    const month = element.dataset.month;
    const year = element.dataset.year;
    header.style.display = "none";

    more_events_overlay.innerHTML =
        `
            <div class="event-modal p-5 rounded shadow-lg text-white" style="width: 100%; height: 100%; position: relative; background: linear-gradient(145deg, #274b7a, #2f5fa1); border: 2px solid #5c8ecb;">
                <!-- Кнопка закрытия -->
                <button onclick="closeBox('events')" style="position: absolute; top: 10px; right: 15px; font-size: 35px; background: none; border: none; color: white; cursor: pointer;">&times;</button>

                <!-- Основной блок -->
                <div class="d-flex flex-column h-100">
                    <div style="font-size: 16px; font-weight: 500; opacity: 0.85;">📅 ${day}-${month}-${year}</div>
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
    if (type == 'news') {
        const box = document.querySelector('.box-overlay');
        box.classList.remove('active');
        blurs.classList.remove('active');
        header.style.display = "flex";
        box.innerHTML = "";
    } else if (type = 'events') {
        more_events_overlay.classList.remove('active');
        header.style.display = "flex";
        more_events_overlay.innerHTML="";
        blurs.classList.remove('active');

    }

}
