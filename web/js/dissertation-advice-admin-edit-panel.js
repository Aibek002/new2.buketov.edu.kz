const dis_advice = document.querySelector("#council");
const type_doc = document.querySelector("#docType");
const normative_doc = document.querySelector("#normative_doc");
const doctorant = document.querySelector("#doctorant");
const doctorant_doc = document.querySelector("#doctorant_doc");
const btn_redirect = document.querySelector("#result");

// --- СБРОС всех селектов при загрузке страницы ---
window.addEventListener("DOMContentLoaded", () => {
  dis_advice.value = "";
  type_doc.value = "";
  normative_doc.innerHTML = `<option value="">-- Выберите --</option>`;
  normative_doc.disabled = true;

  doctorant.innerHTML = `<option value="">-- Выберите --</option>`;
  doctorant.disabled = true;

  doctorant_doc.innerHTML = `<option value="">-- Выберите --</option>`;
  doctorant_doc.disabled = true;

  btn_redirect.disabled = true;
});

dis_advice.addEventListener("change", () => {
  console.log(dis_advice.value);
  type_doc.removeAttribute("disabled");

  type_doc.addEventListener("change", () => {
    if (type_doc.value == 2) {
      // сброс докторантов
      doctorant.disabled = true;
      doctorant.innerHTML = `<option value="">-- Выберите --</option>`;
      doctorant_doc.innerHTML = `<option value="">-- Выберите --</option>`;
      doctorant.value = "";
      doctorant_doc.value = "";
      doctorant_doc.disabled = true;
      btn_redirect.disabled = true;

      // загружаем нормативные документы
      fetch(
        `/yii2/web/index.php?r=ajax/get-normative-docs&diss_id=${dis_advice.value}`
      )
        .then((response) => response.json())
        .then((data) => {
          normative_doc.innerHTML = `<option value="">-- Выберите --</option>`;
          data.forEach((element) => {
            normative_doc.innerHTML += `
                                <option value="${element.id}">
                                    ${element.fileName} (${element.language_file})
                                </option>`;
          });
        })
        .catch((err) => console.error("Ошибка загрузки:", err));

      normative_doc.removeAttribute("disabled");
      normative_doc.addEventListener("change", () => {
        btn_redirect.removeAttribute("disabled");
        btn_redirect.onclick = () => {
          window.location.href = `/yii2/web/index.php?r=admin-edit/edit-form-dissertation-file&id=${normative_doc.value}`;
        };
      });
    } else if (type_doc.value == 1) {
      // сброс нормативных документов
      normative_doc.disabled = true;
      normative_doc.innerHTML = `<option value="">-- Выберите --</option>`;
      normative_doc.value = "";

      doctorant.disabled = false;
      fetch(
        `/yii2/web/index.php?r=ajax/get-doctorants&diss_id=${dis_advice.value}`
      )
        .then((response) => response.json())
        .then((data) => {
          doctorant.innerHTML = `<option value="">-- Выберите --</option>`;
          data.forEach((element) => {
            doctorant.innerHTML += `
                                <option value="${element.id}">
                                    ${element.full_name_ru}
                                </option>`;
          });
        });

      doctorant.addEventListener("change", () => {
        doctorant_doc.disabled = false;
        doctorant_doc.innerHTML = `<option value="">-- Выберите --</option>`;
        fetch(
          `/yii2/web/index.php?r=ajax/get-doctorants-doc&doctorant_id=${doctorant.value}`
        )
          .then((response) => response.json())
          .then((data) => {
            data.forEach((element) => {
              doctorant_doc.innerHTML += `
                                    <option value="${element.id}">
                                        ${element.fileName} (${element.language_file})
                                    </option>`;
            });
          });

        doctorant_doc.addEventListener("change", () => {
          btn_redirect.disabled = false;
          btn_redirect.onclick = () => {
            window.location.href = `/yii2/web/index.php?r=admin-edit/edit-form-dissertation-file&id=${doctorant_doc.value}&doctorant_id=${doctorant.value}`;
          };
        });
      });
    }
  });
});
