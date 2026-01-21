const btnSoleShareholder = document.querySelector("#loadSoleShareHolderBtn");
const btnBoardOfDirectors = document.querySelector("#loadBoardOfDirectorsBtn");
const btnGovernance = document.querySelector("#loadGovernanceBtn");

const btnSustainableDevelopment = document.querySelector(
  "#loadSustainableDevelopmentBtn"
);
const btnDocumentsAndReporting = document.querySelector(
  "#loadDocumentsAndReportingBtn"
);

const allHeaderBtn = document.querySelectorAll(
  "#loadSoleShareHolderBtn, #loadBoardOfDirectorsBtn ,#loadGovernanceBtn , #loadSustainableDevelopmentBtn , #loadDocumentsAndReportingBtn"
);
function deleteActiveClass() {
  const allClass = document.querySelectorAll(
    ".sole-shareholder, .board-of-directors, .governance, .sustainable_development, .DocumentsAndReporting"
  );
  if (allClass) {
    allClass.forEach(function (el) {
      el.classList.remove("active");
    });
  } else {
    console.error("Классы не найдены");
  }
}
function toggleSection(selector) {
  deleteActiveClass();
  document.querySelector(selector).classList.toggle("active");
}

function getBoardMembers(url, lang) {
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      console.log("click board members");
      const containers = {
        7: document.querySelector("#board-members.board-of-directors-section"),
        8: document.querySelector("#secretary.board-of-directors-section"),
        9: document.querySelector("#audit-members.board-of-directors-section"),
        10: document.querySelector(
          "#anti-corruption.board-of-directors-section"
        ),
        11: document.querySelector(
          "#committee-of-board.board-of-directors-section"
        ),
      };
      Object.values(containers).forEach((container) => {
        if (container) container.innerHTML = "";
      });

      data.forEach((person) => {
        const type = person.ref_staff_id;
        console.log(type);
        const container = containers[type];
        if (!container) {
          console.warn("Container not found for ref_staff_id:", type);
          return;
        }

        const card = `
        <div class="card"  data-bs-toggle="modal" data-bs-target="#staffModal"
                data-name="${person["surname_" + lang]} ${
          person["name_" + lang]
        } ${person["patronymic_" + lang]}"
                data-job="${person["job_title_" + lang]}"
                data-info='${person["information_" + lang]}'

                data-image="${
                  person.image?.image ??
                  "https://www.freeiconspng.com/thumbs/person-icon/clipart--person-icon--cliparts-15.png"
                }"
                data-id="${person.id}">
                <div class="avatar-container">
                    <div class="avatar-circle">
                       <img src="${
                         person.image?.image ??
                         "https://www.freeiconspng.com/thumbs/person-icon/clipart--person-icon--cliparts-15.png"
                       }" class="avatar-img">

                 </div>
                </div>

                <h3 class="card-title"> 
                   ${person["surname_" + lang]} ${person["name_" + lang]} ${
          person["patronymic_" + lang]
        }</h3>
                <p class="card-text">${person["job_title_" + lang]}</p>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", card);
      });
    });
}

function getGovernance(url, lang, containerSelector) {
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      console.log("click");
      const container = document.querySelector(containerSelector);
      container.innerHTML = "";
      data.forEach((person) => {
        const card = `
            <div class="card"
            data-bs-toggle="modal" data-bs-target="#staffModal"
                data-name="${person["surname_" + lang]} ${
          person["name_" + lang]
        } ${person["patronymic_" + lang]}"
                data-job="${person["job_title_" + lang]}"
                data-info='${person["information_" + lang]}'

                data-image="${
                  person.image?.image ??
                  "https://www.freeiconspng.com/thumbs/person-icon/clipart--person-icon--cliparts-15.png"
                }"
                data-id="${person.id}">
                <div class="avatar-container">
                    <div class="avatar-circle">
                       <img src="${
                         person.image?.image ??
                         "https://www.freeiconspng.com/thumbs/person-icon/clipart--person-icon--cliparts-15.png"
                       }" class="avatar-img">

                 </div>
                </div>

                <h3 class="card-title"> 
                   ${person["surname_" + lang]} ${person["name_" + lang]} ${
          person["patronymic_" + lang]
        }</h3>
                <p class="card-text">${person["job_title_" + lang]}</p>
            </div>
            `;

        container.innerHTML += card;
      });
    });
}

if (
  btnSoleShareholder &&
  btnBoardOfDirectors &&
  btnGovernance &&
  btnSustainableDevelopment &&
  btnDocumentsAndReporting
) {
  btnSoleShareholder.addEventListener("click", function () {
    allHeaderBtn.forEach((element) => {
      if (element != btnSoleShareholder) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    });
    toggleSection(".sole-shareholder");
  });

  btnBoardOfDirectors.addEventListener("click", function () {
    console.log("Board of Directors clicked");
    const lang = this.dataset.lang;
    allHeaderBtn.forEach((element) => {
      if (element != btnBoardOfDirectors) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    });
    toggleSection(".board-of-directors");
    getBoardMembers(
      "https://new.buketov.edu.kz/yii2/web/index.php?r=ajax/get-board-of-directors",
      lang
    );
  });

  btnGovernance.addEventListener("click", function () {
    allHeaderBtn.forEach((element) => {
      if (element != btnGovernance) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    });
    const lang = this.dataset.lang;
    toggleSection(".governance");
    getGovernance(
      "https://new.buketov.edu.kz/yii2/web/index.php?r=ajax/get-governance",
      lang,
      ".container-governance"
    );
  });

  btnSustainableDevelopment.addEventListener("click", function () {
    allHeaderBtn.forEach((element) => {
      if (element != btnSustainableDevelopment) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    });
    toggleSection(".sustainable_development");
  });

  btnDocumentsAndReporting.addEventListener("click", function () {
    allHeaderBtn.forEach((element) => {
      if (element != btnDocumentsAndReporting) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    });
    toggleSection(".DocumentsAndReporting");
  });
} else {
  console.error("Одна из кнопок не найдена");
}
const staffModal = document.getElementById("staffModal");

staffModal.addEventListener("show.bs.modal", (event) => {
  const card = event.relatedTarget; // элемент, вызвавший модалку

  // Дебаг
  console.log("DEBUG: name =", card.getAttribute("data-name"));
  console.log("DEBUG: job =", card.getAttribute("data-job"));
  console.log("DEBUG: email =", card.getAttribute("data-email"));
  console.log("DEBUG: info =", card.getAttribute("data-info"));
  console.log("DEBUG: phone =", card.getAttribute("data-phone"));
  console.log("DEBUG: image =", card.getAttribute("data-image"));

  // Значения
  const name = card.getAttribute("data-name") || "---";
  const job = card.getAttribute("data-job")?.trim() || "Нет данных о должности";
  const email = card.getAttribute("data-email")?.trim() || "Нет данных о email";
  const info =
    card.getAttribute("data-info")?.trim() || "Нет данных о сотруднике";
  const phone =
    card.getAttribute("data-phone")?.trim() || "Нет данных о телефоне";

  const rawImage = card.getAttribute("data-image");
  const image =
    rawImage &&
    rawImage.trim() !== "" &&
    rawImage.trim().toLowerCase() !== "null"
      ? rawImage
      : "https://cdn-icons-png.flaticon.com/512/4519/4519678.png";

  // Заполнение модалки
  staffModal.querySelector("#modalImage").src = image;
  staffModal.querySelector("#staffModalLabel").innerHTML = name;
  staffModal.querySelector("#modalName").innerHTML = name;
  staffModal.querySelector("#modalInfo").innerHTML = job;
  staffModal.querySelector("#modalEmail").innerHTML = email;
  staffModal.querySelector("#modalPhone").innerHTML = phone;
  staffModal.querySelector("#modalExtra").innerHTML = info;
});
