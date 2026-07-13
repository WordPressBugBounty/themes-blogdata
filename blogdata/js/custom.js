(function ($) {
  "use strict";
  /* =================================
  ===       slider        ====
  =================================== */
  function homefeatured() {
    var recentareaSlider = new Swiper('.recentarea-slider', {
      direction: 'vertical',
      loop: true,
      slidesPerView: 4,
      spaceBetween: 30,
      autoplay: true,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      breakpoints: {
        // when window width is <= 320px
        768: {
          allowTouchMove: 0,
        },
      }
    });
  }
  homefeatured();

  function homemain() {
    var homemain = new Swiper('.homemain', {
      direction: 'horizontal',
      loop: true,
      autoplay: {
        delay: 3000,
      },
      speed: 500,
      slidesPerView: 1,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },

    });
  }
  homemain();
  /* =================================
  ===       Crousel        ====
  =================================== */
  function postcrousel() {
    const postcrousel = new Swiper('.postcrousel', {
      direction: 'horizontal',
      loop: true,
      autoplay: {
        delay: $(".postcrousel").attr("storySpeed"),
      },
      slidesPerView: 1,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      pagination: {
        el: ".crousel-swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      }
    });
  }
  postcrousel();

  /* =================================
  ===         BLOG SLIDER         ====
  =================================== */
  function blogslider() {
    const Blogslider = new Swiper('.blog-slider', {
      direction: 'horizontal',
      loop: true,
      autoplay: true,
      slidesPerView: 1,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      }
    });
  }
  blogslider();

  /* =================================
  ===         SCROLL TOP       ====
  =================================== */
  document.addEventListener("DOMContentLoaded", function () {
    var scrollToTopBtn = document.querySelector(".bs_upscr");
    var rootElement = document.documentElement || document.body; // Ensure cross-browser support

    function handleScroll() {
      var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
      var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

      if (scrollTop / scrollTotal > 0.05) {
        // Show button
        scrollToTopBtn.classList.add("showBtn");
      } else {
        // Hide button
        scrollToTopBtn.classList.remove("showBtn");
      }
    }
    function scrollToTop(event) {
      event.preventDefault(); // Prevent default anchor behavior
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }
    if (scrollToTopBtn) {
      scrollToTopBtn.addEventListener("click", scrollToTop);
      document.addEventListener("scroll", handleScroll);
    }
  });

  /* =================================
  ===         STICKY HEADER       ====
  =================================== */

  document.addEventListener('DOMContentLoaded', function () {
    let stickyHeader = document.querySelector(".bs-menu-full.sticky-header");
    if (stickyHeader) {
      let scrollDownElement = stickyHeader.offsetTop;

      window.addEventListener("scroll", function () {
        if (window.scrollY > scrollDownElement) {
          stickyHeader.classList.add("header-sticky");
        } else {
          stickyHeader.classList.remove("header-sticky");
        }
      }
      );
    }
  });

  var elements = document.getElementsByClassName('bs-sticky');

  for (var i = 0; i < elements.length; i++) {
    new hcSticky(elements[i], {
      stickTo: elements[i].parentNode,
      top: 0,
      bottomEnd: 0,
    });
  }

  jQuery('#load-more-btn').on('click', function () {
    var $hiddenContents = $('.hide-content');
    var $btn = $(this);
    // Check if there is hidden content to show
    var loop_off = 0;
    if ($hiddenContents.length) {
      // Show the hidden content
      $hiddenContents.each(function () {
        if (loop_off < 5) { $(this).removeClass('hide-content'); loop_off++; }
      });
      // You can also remove the "Load More" button if there's no more hidden content
      if (loop_off < 5) {
        $btn.parent().remove();
      }
    } else {
      $btn.parent().remove();
    }
  });
  jQuery(document).ready(function () {
    jQuery('.sm').smartmenus({
      subMenusSubOffsetX: 1,
      subMenusSubOffsetY: -8
    });
  });

  /*---------------------------------------
    Off Canvas           
  -----------------------------------------*/
  let clickableAddElementRight = document.querySelectorAll('[bs-data-clickable-end]');
  let clickableRemoveElement = document.querySelector('[bs-data-removable]');
  let clickableRemoveElementTwo = document.querySelector('[bs-remove-overlay]');
  let targetElement = document.querySelector('[bs-data-targeted]');
  let targetBody = document.querySelector('body');

  // Function to handle the click event
  function handleClickRight() {
    targetElement.classList.add('from-right'); 
    clickableRemoveElementTwo.classList.add('show'); 
    targetBody.style.overflow = 'hidden';
    targetBody.style.paddingRight = '17px';
    if (clickableRemoveElement) {
      clickableRemoveElement.focus();
    }
  }
  
  function handleClickRemove(event) {
    event.preventDefault();
    targetElement.classList.remove('from-right');
    clickableRemoveElementTwo.classList.remove('show'); 
    targetBody.style.overflow = null;
    targetBody.style.paddingRight = null;
    if (clickableAddElementRight.length > 0) {
      clickableAddElementRight[0].focus();
    }
  }

  // Attach the handleClick function to the click event of the clickable element
  if( (clickableAddElementRight !== null) && (clickableAddElementRight !== undefined)) {
    clickableAddElementRight.forEach(function(element) {
      element.addEventListener('click', handleClickRight);
    });
  }

  // Safety checks for the removal elements
  if (clickableRemoveElement) {
    clickableRemoveElement.addEventListener('click', handleClickRemove);
  }
  if (clickableRemoveElementTwo) {
    clickableRemoveElementTwo.addEventListener('click', handleClickRemove);
  }
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && targetElement.classList.contains('from-right')) {
      handleClickRemove(e);
    }
  });

  document.addEventListener('keydown', function(e) {

    if (e.key === 'Tab' && targetElement.classList.contains('from-right')) {

      const firstElement = document.querySelector('[bs-data-removable]');
      const lastElement = document.querySelector('.empty-sidebar-widget-text a');
      // const lastElement = document.querySelector('[bs-data-last]');

      if (!firstElement || !lastElement) return;

      if (document.activeElement === lastElement && !e.shiftKey) {
        e.preventDefault();
        firstElement.focus();
      }

      if (document.activeElement === firstElement && e.shiftKey) {
        e.preventDefault();
        lastElement.focus();
      }
    }
  });


  /*---------------------------------------
    Search           
  -----------------------------------------*/
  let clickAddElementSearch = document.querySelectorAll('[bs-search-clickable]');
  let targetSearchElement = document.querySelector('[bs-search-targeted]');
  let targetHideSearch = document.querySelector('[bs-dismiss-search]');
 
  // Function to handle the click event
  function openSearch(event) {
    event.preventDefault();

    clickableRemoveElementTwo.classList.add('show');
    targetSearchElement.classList.add('show-search');
    targetBody.style.overflow = 'hidden';
    targetBody.style.paddingRight = '17px';

    setTimeout(function () {
      const closeBtn = targetSearchElement.querySelector('[bs-dismiss-search]');

      if (closeBtn) {
        closeBtn.setAttribute('tabindex', '0');
        closeBtn.focus();

        // console.log(document.activeElement === closeBtn);
        // console.log(document.activeElement);
      }
    }, 350);
  }
  function hideSearch() {
    clickableRemoveElementTwo.classList.remove('show'); 
    targetSearchElement.classList.remove('show-search');
    targetBody.style.overflow = null;
    targetBody.style.paddingRight = null;
    if (clickAddElementSearch.length > 0) {
      clickAddElementSearch[0].focus();
    }
  }
  if(clickAddElementSearch){
    clickAddElementSearch.forEach(function(element) {
      element.addEventListener('click', openSearch);
    });
  }
  // clickableRemoveElementTwo.addEventListener('click', hideSearch);
  if (targetHideSearch) {
    targetHideSearch.addEventListener('click', hideSearch);
  }
  clickAddElementSearch.forEach(function(element) {
    element.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        openSearch(e);
      }
    });
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && targetSearchElement.classList.contains('show-search')) {
      hideSearch();
    }
  });
  document.addEventListener('keydown', function(e) {

    if (e.key !== 'Tab') return;
    if (!targetSearchElement.classList.contains('show-search')) return;

    const firstElement = targetSearchElement.querySelector('[bs-dismiss-search]');
    const lastElement = targetSearchElement.querySelector('.search-popup-content .search-form .search-submit');

    if (!firstElement || !lastElement) return;

    if (document.activeElement === lastElement && !e.shiftKey) {
      e.preventDefault();
      firstElement.focus();
    }
    if (document.activeElement === firstElement && e.shiftKey) {
      e.preventDefault();
      lastElement.focus();
    }

  });

  $(document).ready(function () {
    $(".menu-btn").click(function () {
      $(this).toggleClass("on");
      $("#main-nav").slideToggle();
      $("#menu-header-menu").css("transition", "all 0.8s");
    });
  });

  function addKeydownListener() {
    document.addEventListener('keydown', keydownHandler);
  }

  function removeKeydownListener() {
    document.removeEventListener('keydown', keydownHandler);
  }

  function keydownHandler(event) {
    if (event.key === 'Tab') {
      var focusedElement = document.activeElement;
      var parentElement = document.getElementById('main-nav');
      var ulParent = parentElement.querySelector("ul.sm.sm-clean");
      var lastChild = ulParent.lastElementChild.firstElementChild;

      // Check if the focused element is the last child
      if (focusedElement === lastChild) {
        // Prevent the default tab behavior
        event.preventDefault();

        // Perform your actions here
        const returnFocus = document.querySelector('button.menu-btn');
        returnFocus.click();
        returnFocus.focus();
      }
    }
  }

  function checkWindowSize() {
    if (window.innerWidth < 992) {
      addKeydownListener();
    } else {
      removeKeydownListener();
      document.getElementById('main-nav').style.display = '';
    }
  }

  // Check window size on initial load
  checkWindowSize();

  // Check window size on resize
  window.addEventListener('resize', checkWindowSize);

  document.addEventListener('DOMContentLoaded', function () {
    var pageTitle = document.querySelector('.bs-card-box.page-entry-title + .row .page-title');
    if (pageTitle) {
      pageTitle.remove();
    }
  });
})(jQuery);


(function () {

  jQuery(document).ready(function () {

    /* ---------------------------------------------- /*
      * Scroll top
    /* ---------------------------------------------- */

    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 100) {
        jQuery('.page-scroll-up').fadeIn();
      } else {
        jQuery('.page-scroll-up').fadeOut();
      }
    });

    jQuery('.page-scroll-up').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 700);
      return false;
    });
  });
})(jQuery);