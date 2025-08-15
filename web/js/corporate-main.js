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
  closeAllSubCom();
  // closePDFViewer();
}
function openBox(element, type, path) {
  lang = element.dataset.lang;
  positon1 = document.querySelector(".Комитет-по-аудиту-Положение");
  positon2 = document.querySelector(
    ".Комитет-по-кадрам-и-вознаграждениям-Положение"
  );
  positon3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-Положение"
  );
  plan1 = document.querySelector(".Комитет-по-аудиту-План");
  plan2 = document.querySelector(".Комитет-по-кадрам-и-вознаграждениям-План");
  plan3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-План"
  );

  meeting1 = document.querySelector(".Комитет-по-аудиту-Заседание");
  meeting2 = document.querySelector(
    ".Комитет-по-кадрам-и-вознаграждениям-Заседание"
  );
  meeting3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-Заседание"
  );

  positon1?.classList.remove("active");
  positon2?.classList.remove("active");
  positon3?.classList.remove("active");
  plan1?.classList.remove("active");
  plan2?.classList.remove("active");
  plan3?.classList.remove("active");
  meeting1?.classList.remove("active");
  meeting2?.classList.remove("active");
  meeting3?.classList.remove("active");

  if (type.includes("audit-position")) {
    positon1.classList.add("active");
  } else if (type.includes("hr-rem-position")) {
    positon2.classList.add("active");
  } else if (type.includes("str-plan-position")) {
    positon3.classList.add("active");
  }

  if (type.includes("audit-plan")) {
    plan1.classList.add("active");
  } else if (type.includes("hr-rem-plan")) {
    plan2.classList.add("active");
  } else if (type.includes("str-plan-plan")) {
    plan3.classList.add("active");
  }
  if (type.includes("audit-meeting")) {
    meeting1.classList.add("active");
  } else if (type.includes("hr-rem-meeting")) {
    meeting2.classList.add("active");
  } else if (type.includes("str-plan-meeting")) {
    meeting3.classList.add("active");
  }
}
// function loadPDFBoards(filePath) {
//   const pdfViewer = document.querySelector(".pdfViewerBoards");
//   pdfViewer.classList.remove("active");
//   pdfViewer.src = "";
//   setTimeout(() => {
//     pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
//   }, 50);
//   pdfViewer.classList.add("active");
// }
// function closePDFViewer() {
//   const pdfViewer = document.querySelector(".pdfViewerBoards");
//   pdfViewer.classList.remove("active");
// }
function closeAllSubCom() {
  pdfViewer = document.querySelector(".board_governance_pdf");
  positon1 = document.querySelector(".Комитет-по-аудиту-Положение");
  positon2 = document.querySelector(
    ".Комитет-по-кадрам-и-вознаграждениям-Положение"
  );
  positon3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-Положение"
  );
  plan1 = document.querySelector(".Комитет-по-аудиту-План");
  plan2 = document.querySelector(".Комитет-по-кадрам-и-вознаграждениям-План");
  plan3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-План"
  );

  meeting1 = document.querySelector(".Комитет-по-аудиту-Заседание");
  meeting2 = document.querySelector(
    ".Комитет-по-кадрам-и-вознаграждениям-Заседание"
  );
  meeting3 = document.querySelector(
    ".Комитет-по-стратегическому-планированию-Заседание"
  );

  positon1?.classList.remove("active");
  positon2?.classList.remove("active");
  positon3?.classList.remove("active");
  plan1?.classList.remove("active");
  plan2?.classList.remove("active");
  plan3?.classList.remove("active");
  meeting1?.classList.remove("active");
  meeting2?.classList.remove("active");
  meeting3?.classList.remove("active");
  pdfViewer?.classList.remove("active");
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
function openCorpEvent(year) {
  // Убираем active у всех элементов с классом title-content
  document.querySelectorAll(".title-content").forEach((el) => {
    el.classList.remove("active");
  });

  // Находим нужный элемент и добавляем active
  const element = document.querySelector(`.title-content.year-${year}-events`);
  if (element) {
    element.classList.add("active");
  }
}
function openEvents(date, text) {
  const blur = document.querySelector(".blur");
  const over = document.querySelector(".over");

  blur.classList.add("active");

  over.innerHTML = `
    <button class="close-btn" onclick="closeOver()">✕</button>
    <h2>${date}</h2>
    <p>${text}</p>
  `;
  over.classList.add("active");
}

function openGovMeetting(year) {
  const element = document.querySelector(`.gov_met.year-${year}`);
  const isActive = element.classList.contains("active");

  // Сначала снимаем active у всех
  document.querySelectorAll(".gov_met").forEach((el) => {
    el.classList.remove("active");
  });

  // Если он не был активным — открываем
  if (!isActive) {
    element.classList.add("active");
  }
}
function closeOver() {
  document.querySelector(".blur").classList.remove("active");
  document.querySelector(".over").classList.remove("active");
}
