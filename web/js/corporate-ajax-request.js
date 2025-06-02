document.getElementById("loadBtn").addEventListener("click", function () {
  const lang = this.dataset.lang;
  console.log(lang);

  fetch("http://localhost:8081/index.php?r=ajax/get-governance")
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("result").innerHTML = data
        .map(
          (item) => `<p>${item["surname_" + lang]} ${item["name_" + lang]}</p>`
        )
        .join("");
    })
    .catch((error) => console.error("Ошибка:", error));
});
function loadPDF(filePath){
    document.getElementById('pdfViewer').src =filePath + "#toolbar=0&navpanes=0&statusbar=0";
}

