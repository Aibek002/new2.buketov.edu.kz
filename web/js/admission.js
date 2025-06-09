function openSection(type) {
  const existsClasses = document.querySelectorAll(
    ".bakalavriat, .magistrant, .doctorant"
  );
  existsClasses.forEach((classElement) => {
    classElement.classList.remove("active");
  });

  if (type == "bakalavr") {
    const bakalavr = document.querySelector(".bakalavriat");
    bakalavr.classList.toggle("active");
  } else if (type == "magistrant") {
    const magistrant = document.querySelector(".magistrant");
    magistrant.classList.toggle("active");
  } else {
    const doctorant = document.querySelector(".doctorant");
    doctorant.classList.toggle("active");
  }
}
function openGeneralRulesPdf(filePath) {
  const general_rules_pdf = document.querySelector(".general-rules-pdf");
  general_rules_pdf.src = "";

  setTimeout(() => {
    general_rules_pdf.classList.toggle("active");
    console.log(filePath);
    general_rules_pdf.src = filePath;
  }, 50);
}
