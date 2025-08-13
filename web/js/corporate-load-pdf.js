function loadPDF(filePath) {
  const pdfViewer = document.querySelector(".pdfViewer");
  pdfViewer.classList.remove("active");
  pdfViewer.src = "";
  setTimeout(() => {
    pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
  }, 50);
  pdfViewer.classList.add("active");
}
function loadPDFBoardGovernance(filePath) {
  const pdfViewer = document.querySelector(".board_governance_pdf");
  pdfViewer.classList.remove("active");
  pdfViewer.src = "";
  setTimeout(() => {
    pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
  }, 50);
  pdfViewer.classList.add("active");
  pdfViewer.scrollIntoView({ behavior: "smooth" });
}
function openGovMetByYear(filePath){
  const pdfViewer = document.querySelector(".governance_pdf");
  pdfViewer.classList.remove("active");
  pdfViewer.src = "";
  setTimeout(() => {
    pdfViewer.src = filePath + "#toolbar=0&navpanes=0&statusbar=0";
  }, 50);
  pdfViewer.classList.add("active");
  pdfViewer.scrollIntoView({ behavior: "smooth" });
}