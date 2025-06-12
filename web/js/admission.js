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

let selectedSubjects = [];

document.getElementById('view').addEventListener('click', function () {
  const s1 = document.getElementById('subject_id1').value;
  const s2 = document.getElementById('subject_id2').value;
  const lang = this.dataset.lang;

  selectedSubjects = [s1, s2];
  fetch(`https://new.buketov.edu.kz/yii2/web/index.php?r=ajax%2Fadmission-bakalavr&subject1=${s1}&subject2=${s2}`).then((response) => response.json()).then((data) => {
    console.log(data);
    result = document.querySelector('.result-profession-bakalavr');
    result.innerHTML = data.map(p => `<p><strong>${p['name_' + lang]}</strong> </p><p> <strong>${p['grant']}</strong></p><p> <strong>${p['grant']}</strong></p>`).join('');;
  })

  console.log('Выбранные предметы:', selectedSubjects);
});
