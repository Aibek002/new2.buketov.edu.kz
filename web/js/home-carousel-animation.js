
document.addEventListener('DOMContentLoaded', function () {
    let carouselDom = document.querySelector('.carousel');
    let carouselList = document.querySelector('.carousel .list');
    let nextBtn = document.querySelector('#next');
    let prevBtn = document.querySelector('#prev');
    let thumbnail = document.querySelector('.carousel .thumbnail');
    if(nextBtn && prevBtn){
        nextBtn.addEventListener('click',function(){
        changeSlider('next');
        });
        prevBtn.addEventListener('click', function(){
        changeSlider('prev');
        });

        function changeSlider(type){
        let listItem = document.querySelectorAll('.carousel .list .item');
        let thumbnailItem = document.querySelectorAll('.carousel .thumbnail .item');
        if(type=== 'next'){
        carouselDom.classList.remove('next');
            void carouselDom.offsetWidth;
            carouselDom.classList.add('next');
            if(carouselDom.classList.contains('prev')){
            carouselDom.classList.remove('prev');
            }
            carouselList.appendChild(listItem[0]);
            thumbnail.appendChild(thumbnailItem[0]);
        }else{
            carouselDom.classList.remove('prev');
            void carouselDom.offsetWidth;
            carouselDom.classList.add('prev');
            if(carouselDom.classList.contains('next')){
            carouselDom.classList.remove('next');
            }
            thumbnail.prepend(thumbnailItem[thumbnailItem.length-1]);
            carouselList.prepend(listItem[listItem.length-1]);
        }
        }
    }
});