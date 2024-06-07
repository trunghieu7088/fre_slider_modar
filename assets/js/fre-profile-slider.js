(function ($) {
    $(document).ready(function () {
       
        var fre_profile_slider = new Swiper(".fre-profile-slider-list", {  
            nextButton: '.fre-profile-slider-next-area',
            prevButton: '.fre-profile-slider-prev-area',          
            slidesPerView: 2,            
            spaceBetween: 0,                
            speed:200,
            slidesPerGroup:1,                                                
            loop: carousel_settings.loop,
            autoplay:
            {
              enabled: carousel_settings.autoPlay,
              delay: carousel_settings.delay,              
            },
            freeMode:
            {
              enabled: carousel_settings.freeMode,
              sticky: true,
              stopOnLastSlide: true,
            },          
            
            breakpoints: {
    
             300: {
                slidesPerView: 1 + carousel_settings.newStyle,
                spaceBetween: 20,
              },
              640: {
                slidesPerView: 2 + carousel_settings.newStyle,
                spaceBetween: 20,
              },
              768: {
                slidesPerView: 2 + carousel_settings.newStyle,
                spaceBetween: 20,
              },
              1024: {
                slidesPerView: 4 + carousel_settings.newStyle,                
                spaceBetween: 30,
              },
              1920: {
                slidesPerView: 5 + carousel_settings.newStyle,                
                spaceBetween: 30,
              },
            },
    
          });    

          $(".fre-profile-slider-next-area").click(function(){
            fre_profile_slider.slideNext();
       
           });
       
          $(".fre-profile-slider-prev-area").click(function(){
            fre_profile_slider.slidePrev();
       
           });

           function toggleNavigationButtons() {

            if(fre_profile_slider.isBeginning)
            {              
              $(".fre-profile-slider-prev-area").css('display','none');
            }
          
            if (fre_profile_slider.isEnd) 
            {            
              $(".fre-profile-slider-next-area").css('display','none');
            } 

            if(!fre_profile_slider.isBeginning && !fre_profile_slider.isEnd)
            {
              $(".fre-profile-slider-prev-area").css('display','flex');
              $(".fre-profile-slider-next-area").css('display','flex');
            }
            
                            
          }

          fre_profile_slider.on('slideChange', function () { 
            if(carousel_settings.navigationStyle=='both' || carousel_settings.navigationStyle=='classic')           
            {
              toggleNavigationButtons();
            }
            
          });
        
          if(carousel_settings.navigationStyle=='both' || carousel_settings.navigationStyle=='classic')           
          {
              toggleNavigationButtons();
          }


          
    });
})(jQuery);