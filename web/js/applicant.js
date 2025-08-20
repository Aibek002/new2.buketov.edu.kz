const search_professor = document.querySelector('.search-applicant-professor');
const radioContainer = document.querySelector(".staff-radio-list");

search_professor.addEventListener("input", function () {
  const query = search_professor.value.trim();

  if (query.length > 3) {
    fetch(
      `/yii2/web/index.php?r=ajax/get-professor&search=${encodeURIComponent(
        query
      )}`
    )
      .then((response) => response.json())
      .then((data) => {
        // Предположим, что сервер вернёт массив объектов professors
        if (Array.isArray(data)) {
          radioContainer.innerHTML = "";
          radioContainer.innerHTML = "<br/>";
          data.forEach((professor) => {
            console.log(professor);
            const label = document.createElement("label");
            const radio = document.createElement("input");
            radio.type = "radio";
            radio.name = "Files[professor_id]"; // подставь имя своей модели
            radio.value = professor.id;

            label.appendChild(radio);
            radio.classList.add("radio-ds");
            label.appendChild(document.createTextNode(professor.full_name_ru));
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