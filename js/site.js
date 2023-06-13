jQuery(document).ready(function( $ ) {

    const modalGallery = $('#js-gallery-modal')

    if(modalGallery.length){ // if page contains #js-gallery-modal run script

        document.getElementById("close-modal").addEventListener('click', ()=>{
            modalGallery.fadeOut('slow')
            $('.js-gallery-photos').slick('unslick');
            document.body.style.overflowY = "scroll"
        })

        if(document.querySelector('[data-autoload]')){
            openFilterGallery( document.querySelector('[data-autoload]').dataset.autoload )
        }

        function openFilterGallery(currentGallery){
            document.querySelector('.js-gallery-photos').innerHTML = ''
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

        // Filter multiple gallery
        document.querySelectorAll('.gallery-filter').forEach( (item) => {
            item.addEventListener('click', (event) => {
                // const currentGallery = item.dataset.id
                openFilterGallery(item.dataset.id)
                
            })
        })

        // Single gallery
        document.querySelectorAll('.gallery-image').forEach( function(item, index) {
            item.addEventListener('click', event => {
                modalGallery.fadeIn('slow')
                // console.log(index)
                document.body.style.overflowY = "hidden"
                $('.js-gallery-photos').slick({
                    infinite: true,
                    initialSlide: index,
                    slidesToShow: 1,
                    prevArrow: '<div class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg></div>',
                    nextArrow: '<div class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></div>',
                    // appendArrows: $('.slick-controls')
                  });
            } )
        })

    }

    // Show/Hide search box
    $( '#js-search' ).click(function() {
        $( '.js-search' ).toggle(function(){
            $('#ajaxsearchlite1 .orig').focus();
        });
    })

    if( $('#js-slider').length > 0 ) {
        $('div[data-id="1"]').show();
    }

    // Slider Start
    const slider = {
        length : $('#js-slider .slide').length,
        current : 1
    };

    $('.slides-total').text(slider.length);

    $('.btn-open').on('click', function(){

        $('.js-slider-navigation').slideDown(function(){
            $('.btn-open').parent().hide();
            $('.btn-close').parent().show();
        });
        
    });

    $('.js-slider-navigation a').on('click', function(event){
        event.preventDefault();
        $('div[data-id="'+ slider.current +'"]').hide();
        slider.current = parseFloat($(this).attr('href'));
        showSlide(slider.current);
    });

    $('.btn-close').on('click', function(){

        $('.js-slider-navigation').slideUp(function(){
            $('.btn-close').parent().hide();
            $('.btn-open').parent().show();
        });
        
    });

    $('.btn-prev').on("click", function(){
        
        $('div[data-id="'+ slider.current +'"]').hide();
        if(slider.current > 1){
            slider.current = slider.current - 1;
            showSlide(slider.current);
        } else {
            slider.current = slider.length;
            showSlide(slider.current);
        }

    });


    $('.btn-next').on("click", function(){

        $('div[data-id="'+ slider.current +'"]').hide();
        if(slider.current !== slider.length){
            slider.current = slider.current + 1;
            showSlide(slider.current);
        } else {
            slider.current = 1;
            showSlide(slider.current);
        }

    });
  
    function showSlide(slideNumber){
    
        // document.getElementById("js-slider-anchor").scrollIntoView();
        document.getElementById("js-slider").scrollIntoView();
        $('div[data-id="'+ slideNumber +'"]').fadeIn();
        $('.js-slider-navigation a').removeClass('bg-gray-200').addClass('bg-white');
        $('.js-slider-navigation a[href="'+ slideNumber +'"]').addClass('bg-gray-200');
        
        // $(document).offset(0,0);
        // document.location.hash = "#js-slider";
        // $(document).$("#js-slider");

    }

    // Slider end

    $('.js-recipe-photos').slick({
        infinite: true,
        slidesToShow: 1,
        dots: true,
        prevArrow: '<div class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg></div>',
        nextArrow: '<div class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></div>',
        // appendArrows: $('.slick-controls')
      });

    
    

});