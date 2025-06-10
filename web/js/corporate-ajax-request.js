const btnSoleShareholder = document.querySelector("#loadSoleShareHolderBtn");
const btnBoardOfDirectors = document.querySelector("#loadBoardOfDirectorsBtn");
const btnGovernance = document.querySelector("#loadGovernanceBtn");

const btnSustainableDevelopment = document.querySelector(
  "#loadSustainableDevelopmentBtn"
);
const btnDocumentsAndReporting = document.querySelector(
  "#loadDocumentsAndReportingBtn"
);

function deleteActiveClass() {
  const allClass = document.querySelectorAll(
    ".sole-shareholder, .board-of-directors, .governance, .sustainable_development, .documentsAndReporting"
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
        10: document.querySelector("#anti-corruption.board-of-directors-section"),
        11: document.querySelector("#committee-of-board.board-of-directors-section"),
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
          <div class='governance-card' data-id="${person.id}">
            <img class='governance-img' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJQAAACUCAMAAABC4vDmAAAAk1BMVEX///8AESEAAADCxsj///3+/f8ADh8AABX8/PwAABMAEiAAAAsAABEAAA4DFCMAAAjY2t309fYABhsAABjp6uydoKRCRUoAABu1uLx1en7JzM5rcHONj5OqrbG+wMCWmZ5LTlMqLTUJDxZiZWwVGSUPEyNaXmI3OUEXGh8tMjY3OTve4uGChIdrbnceIStUVloADSTxrA1xAAAEKUlEQVR4nO2a7XaiMBBAkzHE8CGQABZR61eVdnHXvv/TbaJ2i2dVaA1h95zcX+0fvSczzEwGEbJYLBaLxWKxWCwWi8VisVgs+iGEfP7Zp8gFjMeDwaCoOEPI6VvmxGCxFHBku8uKnmWYwwjiWbn1XYqxhzGmweh1mXNEHNRbGGUC5SUk0qjGCA4FIqyvKDKUTv0hDi+lQhysZ5z0IqXCUy0BX4PCJkV9RJAREr8FV50k0SElPRyWg9LyphMOYcf7SHW+G+HQuyHleTDpQ2pxPZ/+AM/mneJXcV9K/EiNS01G950w9jOzRg6qAN/KpzMhjbjJRihTeNaQUcoKcrPdmY9F2CRF3Y3ZblNsaZPTMdWNloW53+yE6bAw2GoI2jenlGQ0N6akmN7uMDX8mVGpg9tGKtoblVoOW0lNjErt2kmZPamfURspwzk1ayeVGywJDsrblAS6NVmnHBT/alPRx2YrOj8kjU7haMJMShGUNcbPw2D2tixvfEAb5iks3ow6KRqfP+qa7XyKdNUwowcHblxKVoW7D6AY9bB/IWh6J9dDCpnMPNM4iG1uppV88vaEmJeS03d6Y7+hNhw/GXHMSx3FJiqvvHpt8NR/T+6ix9Uny8DHuH4DlJLvIItBP/sphUNQOg2AhheRe91zRIw2mDrH02DFBGCUCEGpEEOAl1msKn5/O88z/HmyG5erVTne7IseKuY11EPG0yquqpT/G9t9ghzFn//VFvsUuj4yXX45y/eV8qonNWOqZlb7vJ+nL822EMGkuHzz4ZxSP4JtZn5nhuZjcEP87tPd5ben2Y76FIcCxgZHFxkgggYlPJ3rkiwDwXQ2fx4MnuezqQswPE8PCZQDGVtmpNswwhfri2s7DSJXVqrEjYL62ip01wtupi3LRjyGd++zt3in9ued22Ct53gUxmn3j6GMBsrfGnewnwQ/Bqjr8q6cIGncLNZCOAR5Te46hFnSvO28QAznXc6gMggsb75aXUDVZDzvcJCRlXvutriu/yUmz6qzw2IoBvGlczojIO4u16tS4K8l1IfVuOpC6liXl622UteIluojtIeQIdb0Mu0esNAtdJKK/W8k+Qc0ivXnOiHO8guF/G9GS6eDobTVRvEOsrJrJy0btixNJKXuqY+hDL5VDD4JQfObUqbWUd8pmzU8sUp1dmb5UfMHM+r4+lZvtyH8MHwwepiGyUHvDyji+2u7llpaWyBBk4ejpwCtb7V4+aRD6qnUWdSLtYboyfitdS5ns2+PB5dEGksVa/fKuJlgqi9+fCX0hE+s9K2vYv/Bav6B58fapHLw9JyUp3FUyPRJ6ct0KaXDSYZPo1ShT0pfoeIbeHDCOyFgo3F5zPcvoIGXvUYnOfEff9v9GEXMdS60de0I5ef8A1t2i8VisVgsFovFYrFYLBaL5T/kNwtEOygqw6y1AAAAAElFTkSuQmCC'>
            <p class='governance-fio'>${person["surname_" + lang]} ${
          person["name_" + lang]
        } ${person["patronymic_" + lang]}</p>
            <p class='governance-job-title'>${person["job_title_" + lang]}</p>
          </div>
        `;
        container.innerHTML += card;
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
            <div class='governance-card' data-id=${person.id}>
            <img class='governance-img' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJQAAACUCAMAAABC4vDmAAAAk1BMVEX///8AESEAAADCxsj///3+/f8ADh8AABX8/PwAABMAEiAAAAsAABEAAA4DFCMAAAjY2t309fYABhsAABjp6uydoKRCRUoAABu1uLx1en7JzM5rcHONj5OqrbG+wMCWmZ5LTlMqLTUJDxZiZWwVGSUPEyNaXmI3OUEXGh8tMjY3OTve4uGChIdrbnceIStUVloADSTxrA1xAAAEKUlEQVR4nO2a7XaiMBBAkzHE8CGQABZR61eVdnHXvv/TbaJ2i2dVaA1h95zcX+0fvSczzEwGEbJYLBaLxWKxWCwWi8VisVgs+iGEfP7Zp8gFjMeDwaCoOEPI6VvmxGCxFHBku8uKnmWYwwjiWbn1XYqxhzGmweh1mXNEHNRbGGUC5SUk0qjGCA4FIqyvKDKUTv0hDi+lQhysZ5z0IqXCUy0BX4PCJkV9RJAREr8FV50k0SElPRyWg9LyphMOYcf7SHW+G+HQuyHleTDpQ2pxPZ/+AM/mneJXcV9K/EiNS01G950w9jOzRg6qAN/KpzMhjbjJRihTeNaQUcoKcrPdmY9F2CRF3Y3ZblNsaZPTMdWNloW53+yE6bAw2GoI2jenlGQ0N6akmN7uMDX8mVGpg9tGKtoblVoOW0lNjErt2kmZPamfURspwzk1ayeVGywJDsrblAS6NVmnHBT/alPRx2YrOj8kjU7haMJMShGUNcbPw2D2tixvfEAb5iks3ow6KRqfP+qa7XyKdNUwowcHblxKVoW7D6AY9bB/IWh6J9dDCpnMPNM4iG1uppV88vaEmJeS03d6Y7+hNhw/GXHMSx3FJiqvvHpt8NR/T+6ix9Uny8DHuH4DlJLvIItBP/sphUNQOg2AhheRe91zRIw2mDrH02DFBGCUCEGpEEOAl1msKn5/O88z/HmyG5erVTne7IseKuY11EPG0yquqpT/G9t9ghzFn//VFvsUuj4yXX45y/eV8qonNWOqZlb7vJ+nL822EMGkuHzz4ZxSP4JtZn5nhuZjcEP87tPd5ben2Y76FIcCxgZHFxkgggYlPJ3rkiwDwXQ2fx4MnuezqQswPE8PCZQDGVtmpNswwhfri2s7DSJXVqrEjYL62ip01wtupi3LRjyGd++zt3in9ued22Ct53gUxmn3j6GMBsrfGnewnwQ/Bqjr8q6cIGncLNZCOAR5Te46hFnSvO28QAznXc6gMggsb75aXUDVZDzvcJCRlXvutriu/yUmz6qzw2IoBvGlczojIO4u16tS4K8l1IfVuOpC6liXl622UteIluojtIeQIdb0Mu0esNAtdJKK/W8k+Qc0ivXnOiHO8guF/G9GS6eDobTVRvEOsrJrJy0btixNJKXuqY+hDL5VDD4JQfObUqbWUd8pmzU8sUp1dmb5UfMHM+r4+lZvtyH8MHwwepiGyUHvDyji+2u7llpaWyBBk4ejpwCtb7V4+aRD6qnUWdSLtYboyfitdS5ns2+PB5dEGksVa/fKuJlgqi9+fCX0hE+s9K2vYv/Bav6B58fapHLw9JyUp3FUyPRJ6ct0KaXDSYZPo1ShT0pfoeIbeHDCOyFgo3F5zPcvoIGXvUYnOfEff9v9GEXMdS60de0I5ef8A1t2i8VisVgsFovFYrFYLBaL5T/kNwtEOygqw6y1AAAAAElFTkSuQmCC'>
            <p class='governance-fio'>${
              person["surname_" + lang] +
              " " +
              person["name_" + lang] +
              " " +
              person["patronymic_" + lang]
            }</p>
            <p class='governance-job-title'>${person["job_title_" + lang]}
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
    toggleSection(".sole-shareholder");
  });

  btnBoardOfDirectors.addEventListener("click", function () {
    const lang = this.dataset.lang;
    toggleSection(".board-of-directors");
    getBoardMembers(
      "https://new.buketov.edu.kz/yii2/web/index.php?r=ajax/get-board-of-directors",
      lang
    );
  });

  btnGovernance.addEventListener("click", function () {
    const lang = this.dataset.lang;
    toggleSection(".governance");
    getGovernance(
      "https://new.buketov.edu.kz/yii2/web/index.php?r=ajax/get-governance",
      lang,
      ".container-governance"
    );
  });

  btnSustainableDevelopment.addEventListener("click", function () {
    toggleSection(".sustainable_development");
  });

  btnDocumentsAndReporting.addEventListener("click", function () {
    toggleSection(".content-corporate-documents");
  });
} else {
  console.error("Одна из кнопок не найдена");
}
