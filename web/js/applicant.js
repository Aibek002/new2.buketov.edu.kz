function openDocsProf(name) {
  const professorsDocs = document.querySelectorAll('[class*="professor-"]');
  professorsDocs.forEach((el) => {
    el.classList.remove("active");
  });
  document.querySelector(`.professor-${name}`).classList.add("active");
}
function openGeneralRulesPdf(file_link) {
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
    // Проверяем расширение файла
    if (file_link.toLowerCase().endsWith(".pdf")) {
      // Если это PDF — открываем напрямую
      iframe.src = "https://new.buketov.edu.kz" + file_link;
    } else {
      // Если это DOC, DOCX и т.п. — открываем через Google Docs Viewer
      const encodedUrl = encodeURI("https://new.buketov.edu.kz" + file_link);
      iframe.src =
        "https://docs.google.com/gview?url=" + encodedUrl + "&embedded=true";
    }
    modal.style.display = "flex";
  }, 1);
}
