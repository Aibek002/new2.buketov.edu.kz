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
  general_rules_pdf.classList.remove("active");

  console.log(filePath);
  setTimeout(() => {
    general_rules_pdf.classList.add("active");
    console.log(filePath);
    general_rules_pdf.src = filePath;
  }, 50);
}

function openForm(type) {
  const form = document.querySelector('.select-form-by-specialization');
  const entForm = document.querySelector('.form-search-by-ent');
  const specializationForm = document.querySelector('.form-search-by-specialization');
  const collegeForm = document.querySelector('.form-search-by-college');
  const all = document.querySelectorAll('.form-search-by-ent,.form-search-by-specialization,.form-search-by-college');
  all.forEach(all => {
    if (type != 'view-form') {
      all.classList.remove('active');
    }
  });
  console.log(type);
  if (type == 'view-form') {
    form.classList.add('active');
  } else if (type == 'search-by-ent') {
    entForm.classList.add('active');
    changeTitle('ent');
  } else if (type == 'search-by-specialization') {
    specializationForm.classList.add('active');
    changeTitle('specialization');
  } else if (type == 'search-by-college') {
    collegeForm.classList.add('active');
    changeTitle('college');

  }
}

function changeTitle(type) {
  const resultTitleEnt = document.querySelector('.result-title-ent');
  const resultTitleSpecial = document.querySelector('.result-title-specialization');
  const resultTitleCollege = document.querySelector('.result-title-college');
  const resultContent = document.querySelector('.result-profession-bakalavr');

  const all = document.querySelectorAll('.result-title-ent,.result-title-specialization,.result-title-college');

  all.forEach(all => {
    all.classList.remove('active');

  })
  resultContent.innerHTML = "";
  if (type == 'ent') {
    resultTitleEnt.classList.add('active');
  } else if (type == 'specialization') {
    resultTitleSpecial.classList.add('active');
  } else {
    resultTitleCollege.classList.add('active');
  }
}
let selectedSubjects = [];


document.getElementById('viewSpecialization').addEventListener('click', function () {
  const profession = document.querySelector('#profession').value;
  const result = document.querySelector('.result-profession-bakalavr');
  fetch(`/yii2/web/index.php?r=ajax%2Fadmission-form-specialization&prof_type=${profession}`)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (Array.isArray(data)) {
        const grouped_data = {};
        data.forEach(data_item => {
          const key = `${data_item['p_name']}`
          if (!grouped_data[key]) {
            grouped_data[key] = {
              p_name: data_item['p_name'],
              ent: [],
              s_passing_points: data_item['s_passing_points'],
              passing_points: data_item['passing_points']
            }
          }
          if (!grouped_data[key].ent.includes(data_item['ent'])) {
            grouped_data[key].ent.push(data_item['ent']);

          }
        });
        const resultDB = Object.values(grouped_data);
        result.innerHTML = resultDB.map(resultDB_item =>
          `<div style='display: grid;grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));'>
          <p><strong>${resultDB_item['p_name']}</strong></p>
          <p><strong> ${resultDB_item['ent']}</strong></p>
          <p><strong> ${resultDB_item['s_passing_points']} из 140</strong></p>
          <p><strong> ${resultDB_item['passing_points']} из 140</strong></p> </div>`
        ).join('');
      } else {
        result.innerHTML = '<p>Нет данных для отображения</p>';
      }


    })

});

document.getElementById('view').addEventListener('click', function () {
  const s1 = document.getElementById('subject_id1').value;
  const s2 = document.getElementById('subject_id2').value;
  const lang = this.dataset.lang; // например: 'kz', 'ru', 'en'
  fetch(`/yii2/web/index.php?r=ajax%2Fadmission-bakalavr&subject1=${s1}&subject2=${s2}`)
    .then(response => response.json())
    .then(data => {
      console.log('Ответ от сервера:', data);
      const result = document.querySelector('.result-profession-bakalavr');

      if (Array.isArray(data)) {
        result.innerHTML = data.map(p => `
          <div style='display: grid;grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));'><p><strong>${p['name_' + lang]}</strong></p>
          <p><strong> ${p['semi_passing_points']} из 140</strong></p>
          <p><strong> ${p['passing_points']} из 140</strong></p> </div>
          `).join('');
      } else {
        result.innerHTML = '<p>Нет данных для отображения</p>';
      }
    })
    .catch(error => {
      console.error('Ошибка при получении данных:', error);
      document.querySelector('.result-profession-bakalavr').innerHTML = '<p>Произошла ошибка при загрузке данных</p>';
    });


});
const inputSearchCollegeProf = document.querySelector('#search-profession-college');
let searchTimer;
inputSearchCollegeProf.addEventListener('input', () => {

  clearTimeout(searchTimer);
  const funcSearch = () => {
    const value = inputSearchCollegeProf.value.trim();
    const lang = inputSearchCollegeProf.dataset.lang
    const result = document.querySelector('.result-profession-bakalavr');

    console.log(lang)

    if (value.length < 2) {
      result.innerHTML = 'Данные не найдены, название специальности колледжа слишком короткая!';
      return;
    }

    if (inputSearchCollegeProf.value.length >= 2) {
      fetch(`/yii2/web/index.php?r=ajax%2Fbakalavr-college&prof_college=${encodeURIComponent(value)}&lang=${lang}`)
        .then((response) => response.json())
        .then((data) => {
          console.log('Ответ от сервера:', data);
          const grouped = {};

          data.forEach(item => {
            const key = `${item.pc_name}_${item.p_name}`;

            if (!grouped[key]) {
              grouped[key] = {
                pc_name: item.pc_name,
                p_name: item.p_name,
                s_names: [],
                semi_passing: item.p_s_passing_points,
                passing: item.p_passing_points
              };
            }
            if (!grouped[key].s_names.includes(item.s_name)) {
              grouped[key].s_names.push(item.s_name);
            }
          });
          const results = Object.values(grouped);

          // Выводим результат
          console.log(results);

          result.innerHTML = "";

          if (results.length > 0) {
            result.innerHTML = results.map(p => `
            <div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); '>
              <p> ${p.pc_name}</p>
              <p> ${p.p_name}</p>
              <p> ${p.s_names.join(', ')}</p>
            
              <p> 35 из 70 </p>
            </div>
          `).join('');
          } else {
            result.innerHTML = '<p>Нет данных для отображения</p>';
          }
        })
    }
  }
  searchTimer = setTimeout(funcSearch, 500);


})