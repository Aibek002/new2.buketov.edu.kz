let currentCommittee = null;

function selectCommittee(committee) {
    currentCommittee = committee;
    buttons_points = document.querySelector('.button-section.points');
    document.querySelectorAll('.button-section.points button').forEach(element => {
        const points = element.getAttribute('data-point');
        element.setAttribute('onclick', `openBox(this,'${committee}-${points}','${committee}-committee')`)
    });
    buttons_points.classList.add('active');
    closePDFViewer();
}
function openBox(element, type, path) {
    lang = element.dataset.lang;
    if (type.includes('position')) {
        loadPDFBoards(`/files/pdf/corporate_governance/board-of-directors/committee/${path}/${lang}/положение.pdf`);
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