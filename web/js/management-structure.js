const staffModal = document.getElementById("staffModal");

staffModal.addEventListener("show.bs.modal", (event) => {
  const card = event.relatedTarget; // элемент, вызвавший модалку

  // Дебаг
  console.log("DEBUG: name =", card.getAttribute("data-name"));
  console.log("DEBUG: job =", card.getAttribute("data-job"));
  console.log("DEBUG: email =", card.getAttribute("data-email"));
  console.log("DEBUG: info =", card.getAttribute("data-info"));
  console.log("DEBUG: phone =", card.getAttribute("data-phone"));
  console.log("DEBUG: image =", card.getAttribute("data-image"));

  // Значения
  const name = card.getAttribute("data-name") || "---";
  const job = card.getAttribute("data-job")?.trim() || "Нет данных о должности";
  const email = card.getAttribute("data-email")?.trim() || "Нет данных о email";
  const info = card.getAttribute("data-info")?.trim() || "Нет данных о сотруднике";
  const phone = card.getAttribute("data-phone")?.trim() || "Нет данных о телефоне";

  const rawImage = card.getAttribute("data-image");
  const image =
    rawImage && rawImage.trim() !== "" && rawImage.trim().toLowerCase() !== "null"
      ? rawImage
      : "https://cdn-icons-png.flaticon.com/512/4519/4519678.png";

  // Заполнение модалки
  staffModal.querySelector("#modalImage").src = image;
  staffModal.querySelector("#staffModalLabel").innerHTML = name;
  staffModal.querySelector("#modalName").innerHTML = name;
  staffModal.querySelector("#modalInfo").innerHTML = job;
  staffModal.querySelector("#modalEmail").innerHTML = email;
  staffModal.querySelector("#modalPhone").innerHTML = phone;
  staffModal.querySelector("#modalExtra").innerHTML = info;
});
