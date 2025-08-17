const search_doctorant = document.querySelector(".search-doctorant");
const radioContainer = document.querySelector(".staff-radio-list");
const fileInput = document.querySelector(".files");
const container_input_name = document.querySelector(".container-input-name");
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
            radio.name = "Files[staff_id]"; // подставь имя своей модели
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
fileInput.addEventListener("change", () => {
  container_input_name.innerHTML = "";
  Array.from(fileInput.files).forEach((file, index) => {
    console.log(index);
    container_input_name.innerHTML += `<input class="form-control" name="input_name_${index}" placeholder="Напишите название файла и ссылки : ${file.name}"/><br/>`;
  });
  console.log("Выбрано файлов:", fileInput.files.length);
});
