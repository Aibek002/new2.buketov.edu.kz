function openDissJob(staffId) {
  document.querySelectorAll(".document").forEach((element) => {
    element.classList.remove("active");
  });
  document.getElementById(`staff-${staffId}`).classList.toggle("active");
}
// function openGeneralRulesPdf(filePath) {
//   let selector = ".general-rules-pdf"; // Это класс
//   const general_rules_pdf = document.querySelector(selector); // получаем элемент по классу

//   if (!general_rules_pdf) {
//     console.warn("Элемент не найден:", selector);
//     return;
//   }

//   // Очистка и обновление источника PDF
//   general_rules_pdf.src = "";
//   general_rules_pdf.classList.remove("active");

//   setTimeout(() => {
//     general_rules_pdf.classList.add("active");
//     general_rules_pdf.src = filePath;
//   }, 50);

//   // Прокрутка к элементу
//   general_rules_pdf.scrollIntoView({ behavior: "smooth" });
// }
function openDissPdf(filePath) {
  let selector = ".general-ds-pdf"; // Это класс
  const general_rules_pdf = document.querySelector(selector); // получаем элемент по классу

  if (!general_rules_pdf) {
    console.warn("Элемент не найден:", selector);
    return;
  }

  // Очистка и обновление источника PDF
  general_rules_pdf.src = "";
  general_rules_pdf.classList.remove("active");

  setTimeout(() => {
    general_rules_pdf.classList.add("active");
    general_rules_pdf.src = filePath;
  }, 50);

  // Прокрутка к элементу
  general_rules_pdf.scrollIntoView({ behavior: "smooth" });
}

function openGeneralRulesPdf(filePath) {
  const modal = document.getElementById("pdfModal");
  const iframe = document.getElementById("pdfIframe");

  if (!modal || !iframe) {
    console.error("Элемент модального окна не найден.");
    return;
  }

  // Очистка и обновление источника iframe
  iframe.src = "";

  // Небольшая задержка для корректного сброса src в некоторых браузерах
  setTimeout(() => {
    iframe.src = filePath;
    modal.style.display = "flex"; // Показываем модальное окно
  }, 50);

  // Теперь прокручивать ничего не нужно, так как модальное окно появляется по центру экрана
}
