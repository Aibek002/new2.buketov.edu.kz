const header = document.querySelector('.header')
const blurs = document.querySelector('.blur');
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
                <div class="p-4 rounded shadow" style="width: 100%; height: 100%; position: relative;">
                    <button onclick="closeBox()" style="position: absolute; top: 0px; right: 5px; font-size: 45px; background: none; border: none; color: white; ">&times;</button>
                    <div class="d-flex rounded mb-4 h-md-250">
                        <div class="p-4 d-flex flex-column position-static" style="flex: 1;">
                            <div class="">${date}</div>
                            <h2 class="mb-5 fw-bold">${title}</h2> 
                        
                            <div class="card-text-news mb-auto" style="max-height: 80%; overflow-y: auto;">
                                ${content}
                            </div>
                        </div>
                        <div class="d-flex align-items-start " style="margin-left: 20px; padding-block:10% ">
                            <img src="https://e.buketov.edu.kz/img/logo_ksu.png" alt="News Image" >
                        </div>
                    </div>
                </div>

        `;
    }
}

function closeBox() {
    const box = document.querySelector('.box-overlay');
    box.classList.remove('active');
    blurs.classList.remove('active');
    header.style.display = "flex";
    box.innerHTML = "";
}
