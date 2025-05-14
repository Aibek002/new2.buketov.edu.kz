
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon= document.querySelector('.dropdown-toggle-header');
    const logo = document.querySelector('.logoBuketov');
    const header = document.querySelector('.header');
    window.addEventListener('scroll',function(){
    if(window.scrollY>500){
        header.classList.add('scrolled');
        logo.style.display='block';
        menuIcon.style.backgroundColor="transparent"
        menuIcon.style.border="1px #fff solid";

    }else if(window.scrollY<500){
        header.classList.remove('scrolled');
        logo.style.display='none';
        menuIcon.style.backgroundColor="var(--indigoblue)"
        menuIcon.style.border="none";
    }
    });
});