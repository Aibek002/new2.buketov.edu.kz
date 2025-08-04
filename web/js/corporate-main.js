let currentCommittee = null;

function selectCommittee(committee) {
  currentCommittee = committee;
  buttons_points = document.querySelector(".button-section.points");
  document
    .querySelectorAll(".button-section.points button")
    .forEach((element) => {
      const points = element.getAttribute("data-point");
      element.setAttribute(
        "onclick",
        `openBox(this,'${committee}-${points}','${committee}-committee')`
      );
    });
  buttons_points.classList.add("active");
  closePDFViewer();
}
function openBox(element, type, path) {
  lang = element.dataset.lang;
  if (type.includes("position")) {
    loadPDFBoards(
      `/files/pdf/corporate_governance/board-of-directors/committee/${path}/${lang}/положение.pdf`
    );
  }
}
function loadPDFBoards(filePath) {
  const pdfViewer = document.querySelector(".pdfViewerBoards");
  pdfViewer.classList.remove("active");
  pdfViewer.src = "";
  setTimeout(() => {
    pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
  }, 50);
  pdfViewer.classList.add("active");
}
function closePDFViewer() {
  const pdfViewer = document.querySelector(".pdfViewerBoards");
  pdfViewer.classList.remove("active");
}

function openBoardMeeting(safe_id) {
  const element = document.querySelector(`.${safe_id}`);
  
  // Если элемент не найден — просто выйти
  if (!element) {
    console.warn(`Элемент с классом "${safe_id}" не найден`);
    return;
  }

  const isActive = element.classList.contains("active");

  // Удалить "active" у всех
  document.querySelectorAll(".board-meeting").forEach(function (item) {
    item.classList.remove("active");
  });

  // Если изначально не был активен — сделать активным
  if (!isActive) {
    element.classList.add("active");
  }
}
function openBoardEvents(safe_id) {
  const element = document.querySelector(`.${safe_id}`);
  
  // Если элемент не найден — просто выйти
  if (!element) {
    console.warn(`Элемент с классом "${safe_id}" не найден`);
    return;
  }

  const isActive = element.classList.contains("active");

  // Удалить "active" у всех
  document.querySelectorAll(".board-events").forEach(function (item) {
    item.classList.remove("active");
  });

  // Если изначально не был активен — сделать активным
  if (!isActive) {
    element.classList.add("active");
  }
}