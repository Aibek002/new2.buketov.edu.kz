const search_doctorant = document.querySelector(".search-doctorant");
const radioContainer = document.querySelector(".staff-radio-list");
search_doctorant.addEventListener("input", function () {
  const query = search_doctorant.value.trim();

  if (query.length > 3) {
    fetch(
      `https://new.buketov.edu.kz/yii2/web/index.php?r=ajax/get-doctorant&search=${encodeURIComponent(
        query
      )}`
    )
      .then((response) => response.json())
      .then((data) => {
        // Предположим, что сервер вернёт массив объектов doctorants
        if (Array.isArray(data)) {
          radioContainer.innerHTML = "";

          data.forEach((doctorant) => {
            const label = document.createElement("label");
            const radio = document.createElement("input");
            radio.type = "radio";
            radio.name = "ModelName[staff_id]"; // подставь имя своей модели
            radio.value = doctorant.id;

            label.appendChild(radio);
            label.appendChild(
              document.createTextNode(
                " " +
                  doctorant.surname_ru +
                  " " +
                  doctorant.name_ru +
                  " " +
                  doctorant.patronymic_ru
              )
            );
            radioContainer.appendChild(label);
            radioContainer.appendChild(document.createElement("br"));
          });
        } else {
          console.warn("Неожиданный формат ответа:", data);
        }
      })
      .catch((error) => {
        console.error("Ошибка запроса:", error);
      });
  }
});
