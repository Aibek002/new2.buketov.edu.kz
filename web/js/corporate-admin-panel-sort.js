
document.addEventListener("DOMContentLoaded",function(){
    const select_subsection = document.querySelector('.select-subsection-corpupr');
    const select_year = document.querySelector('.select-year');
    select_subsection.addEventListener('change', function(){
        if(select_subsection.value === 'Решения Единственного Акционера'){
            select_year.classList.add('active');

        }else{
            select_year.classList.remove('active');
            console.log('Selected value:', select_subsection.value);

        }
    });
});