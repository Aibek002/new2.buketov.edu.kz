const header = document.querySelector('.header')
const blurs = document.querySelector('.blur');
const more_teachers = document.querySelector('.more-teachers-overlay')
function openTeachersBox(element) {
    let fio = element.dataset.fio;
    let job_title = element.dataset.jobtitle;
    let info = element.dataset.info;

    header.style.display = "none";
    blurs.classList.add('active');
    more_teachers.innerHTML = "";
    more_teachers.classList.add('active');
    more_teachers.innerHTML =
        `
 <div class="event-modal p-5 rounded shadow-lg text-white" style="width: 100%; height: 100%; position: relative; background: linear-gradient(145deg, #274b7a, #2f5fa1); border: 2px solid #5c8ecb;">
    <!-- Кнопка закрытия -->
    <button onclick="closeBox('events')" style="position: absolute; top: 10px; right: 15px; font-size: 35px; background: none; border: none; color: white; cursor: pointer;">&times;</button>

    <!-- Основной блок -->
    <div class="d-flex flex-column h-100">
        <!-- Имя преподавателя -->
        <h2 class="my-3 fw-bold" style="font-size: 28px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 10px;">
            👨‍🏫 ${fio}
        </h2>

        <!-- Должность -->
        <div style="font-size: 16px; font-weight: 500; opacity: 0.85; margin-bottom: 15px;">
            💼 ${job_title}
        </div>

        <!-- Информация -->
        <div class="card-text-teacher" style="overflow-y: auto; font-family: 'Segoe UI', sans-serif; font-size: 16px; flex-grow: 1; line-height: 1.7;">
            ${info}
        </div>
    </div>
</div>


    `;

}
function closeBox(type) {
    header.style.display = "flex";
    blurs.classList.remove('active');
    more_teachers.innerHTML = "";
    more_teachers.classList.remove('active');
}