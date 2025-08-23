function openDocsProf(name) {
  const professorsDocs = document.querySelectorAll(
    '[class*="professor-"]'
  );
  professorsDocs.forEach((el) => {
    el.classList.remove("active");
  });
  document.querySelector(`.professor-${name}`).classList.add("active");
}
