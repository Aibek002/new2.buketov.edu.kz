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

function openForm(type) {
  formFull = document.querySelector('.form-full-time');
  formShort = document.querySelector('.form-short-time');

  if (type == 'full') {
    formFull.classList.toggle('active');
    formShort.classList.remove('active');

  } else {
    formFull.classList.remove('active');
    formShort.classList.toggle('active');
  }
}


let selectedSubjects = [];




document.getElementById('view').addEventListener('click', function () {
  const s1 = document.getElementById('subject_id1').value;
  const s2 = document.getElementById('subject_id2').value;
  const lang = this.dataset.lang; // например: 'kz', 'ru', 'en'
  const selectedSubjects = [s1, s2];
  fetch(`/yii2/web/index.php?r=ajax%2Fadmission-bakalavr&subject1=${s1}&subject2=${s2}`)
    .then(response => response.json())
    .then(data => {
      console.log('Ответ от сервера:', data);
      const result = document.querySelector('.result-profession-bakalavr');
      if (Array.isArray(data)) {
        result.innerHTML = data.map(p => `
          <div style='display: grid;grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));'><p><strong>${p['name_' + lang]}</strong></p>
          <p><strong> ${p['semi_passing_points']}</strong></p>
          <p><strong> ${p['passing_points']}</strong></p> </div>
          `).join('');
      } else {
        result.innerHTML = '<p>Нет данных для отображения</p>';
      }
      console.log('Выбранные предметы:', selectedSubjects);
    })
    .catch(error => {
      console.error('Ошибка при получении данных:', error);
      document.querySelector('.result-profession-bakalavr').innerHTML = '<p>Произошла ошибка при загрузке данных</p>';
    });


});
const inputSearchCollegeProf = document.querySelector('#search-profession-college');
inputSearchCollegeProf.addEventListener('input', () => {
  if (inputSearchCollegeProf.value.length >= 2) {
    const prof_college = inputSearchCollegeProf.value
    fetch(`/yii2/web/index.php?r=ajax%2Fbakalavr-college&prof_college=${prof_college}`).then((response)=>response.json()).then((data)=>{
      console.log('Ответ от сервера:', data);
      const result = document.querySelector('.result-profession-college');
      result.innerHTML="";
      if (Array.isArray(data)) {
        result.innerHTML = data.map(p => `
          <div style='display: grid;grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));'><p><strong>${p['name_kz']}</strong></p>
          <p><strong> ${p['semi_passing_points']}</strong></p>
          <p><strong> ${p['passing_points']}</strong></p> </div>
          `).join('');
      } else {
        result.innerHTML = '<p>Нет данных для отображения</p>';
      }
      console.log('Выбранные предметы:', selectedSubjects);
    })
    console.log(inputSearchCollegeProf.value);
  }

})