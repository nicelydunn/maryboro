/**
 * File gallery-scroll.js
 *
 */
( function() {
	
    if( document.querySelectorAll('.js-gallery-scroll-photo').length < 1 ){
        return
    }
    
    const galleryList = document.querySelectorAll('.js-gallery-scroll-photo');
    const previousBtn = document.querySelector('.js-gallery-scroll-previous');
    const nextBtn = document.querySelector('.js-gallery-scroll-next');
    let currentPanel = 1;
    showPanel();

    if(nextBtn){
        nextBtn.addEventListener('click', function(e){
            e.preventDefault();
            hidePanel();
            if( (currentPanel + 1) > galleryList.length ) {
                currentPanel = 1;
            } else {
                currentPanel++;
            }
            showPanel();
            
        })
    }
    
    if(previousBtn){
        previousBtn.addEventListener('click', function(e){
            e.preventDefault();
            hidePanel();
            if( (currentPanel -1) == 0 ) {
                currentPanel = galleryList.length;
            } else {
                currentPanel--;
            }
            showPanel();
            
        })
    }

    function hidePanel(){
        document.getElementById('gallery').scrollIntoView();
        document.querySelector('[data-photo="' + currentPanel + '"]').classList.add('hidden');
        document.querySelector('[data-caption="' + currentPanel + '"]').classList.add('hidden');
    }

    function showPanel(){
       document.querySelector('[data-photo="' + currentPanel + '"]').classList.remove('hidden');
       document.querySelector('[data-caption="' + currentPanel + '"]').classList.remove('hidden');
    }

}() );
