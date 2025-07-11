function loadPDF(filePath) {

  const pdfViewer = document.querySelector(".pdfViewer");
  pdfViewer.classList.remove("active");
  pdfViewer.src = "";
  setTimeout(() => {
    pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
  }, 50);
  pdfViewer.classList.add("active");



}
