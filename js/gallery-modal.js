jQuery(document).ready(function( $ ) {

    const modalGallery = $('#js-modal-gallery')
    const slickGallery = $('.js-gallery-photos')

    $('#close-modal').on('click', closeModal)

    function closeModal(){
        slickGallery.hide()
        modalGallery.fadeOut('slow')
        slickGallery.slick('unslick')
        document.body.style.overflowY = "scroll"
    }

    if(document.querySelector('[data-autoload]')){
        openFilterGallery( document.querySelector('[data-autoload]').dataset.autoload )
    }

        function openFilterGallery(currentGallery){
            document.querySelector('.js-gallery-photos').innerHTML = ''
            slickGallery.show()
            document.querySelectorAll(`[data-gallery="${currentGallery}"]`).forEach( image => {
                let cloneDiv = image.cloneNode(true)
                document.querySelector('.js-gallery-photos').appendChild(cloneDiv)
            })
            modalGallery.fadeIn('slow')
            document.body.style.overflowY = "hidden"
            $('.js-gallery-photos').slick({
                infinite: true,
                initialSlide: 0,
                slidesToShow: 1,
                fade: true,
                prevArrow: '<div class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg></div>',
                nextArrow: '<div class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></div>',
            });
        }

    document.querySelectorAll('.gallery-filter').forEach( (item) => {
        item.addEventListener('click', () => {
            openFilterGallery(item.dataset.id)  
        })
    })

});