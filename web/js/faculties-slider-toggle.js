document.addEventListener("DOMContentLoaded", function () {
  const infAboutFacultiesBTN = document.querySelector(".information-faculties-btn");
  const dateAndFactsBTN = document.querySelector(".date-and-facts-faculties-btn");
  const departamentBTN = document.querySelector(".departament-faculties-btn");
  const moveBox = document.querySelector(".move-content-faculties");

  // Проверка, что контейнер moveBox существует
  if (!moveBox) return;

  // Обработчик для кнопки "Информация о факультете"
  if (infAboutFacultiesBTN) {
    infAboutFacultiesBTN.addEventListener("click", function () {
      updateMoveClass("part-infAboutFaculties");
    });
  }

  // Обработчик для кнопки "Даты и факты"
  if (dateAndFactsBTN) {
    dateAndFactsBTN.addEventListener("click", function () {
      updateMoveClass("part-dateAndFacts");
    });
  }

  // Обработчик для кнопки "Кафедры"
  if (departamentBTN) {
    departamentBTN.addEventListener("click", function () {
      updateMoveClass("part-departament");
    });
  }

  function updateMoveClass(newClass) {
    moveBox.classList.remove(
      "part-infAboutFaculties",
      "part-dateAndFacts",
      "part-departament"
    );
    moveBox.classList.add(newClass);
  }
});
