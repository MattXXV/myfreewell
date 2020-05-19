
console.log('freewell js loaded!!!');

var pageClass = document.querySelector('body');
function socialIconAnimation() {
  var facebook = document.querySelector('.social-desktop .fa-facebook-f');
  var linkedin = document.querySelector('.social-desktop .fa-linkedin-in');
  var instagram = document.querySelector('.social-desktop .fa-instagram');

  var links = document.querySelectorAll('.menu-item');


  TweenMax.fromTo(facebook, 1, {x: 300, opacity: 1}, {x: 0, opacity: 1});
  TweenMax.fromTo(linkedin, 1, {x: 300, opacity: 1}, {x: 0, opacity: 1, delay: 0.2});
  TweenMax.fromTo(instagram, 1, {x: 300, opacity: 1}, {x: 0, opacity: 1, delay: 0.4});


}

// socialIconAnimation();

function mobileToggleStyleAdjust() {
  var button = document.querySelector('.navbar-toggle');



  button.addEventListener('click', function() {
    var menuOpen = document.querySelector('.in');
    if(menuOpen) {
      // button.style.backgroundColor = '#ebc181';
      button.style.backgroundColor = 'white';
    } else {
      button.style.backgroundColor = 'lightgray';
    }
  });

}

mobileToggleStyleAdjust();

window.onresize = mobileToggleStyleAdjust;

var upArrow = document.querySelector('.up-arrow');

if(upArrow) {

  upArrow.addEventListener('click', function() {

    gsap.to(window,  {duration: 1, scrollTo: {y: -500, offsetY: 0}});
  });
}

function homeRotator() {
var bannerTl = gsap.timeline({ repeat: -1 });
var b1 = document.querySelector('.banner-one');
var b2 = document.querySelector('.banner-two');
var b3 = document.querySelector('.banner-three');

var slideButtons = document.querySelectorAll('.slide-bttn');
var slideBttn1 = document.querySelector('.slide1-bttn');
var slideBttn2 = document.querySelector('.slide2-bttn');
var slideBttn3 = document.querySelector('.slide3-bttn');
var sliders = ['slide-one', 'slide-two', 'slide-three'];
var lastSlide = localStorage.getItem('freewell');

  function setSlideBttnActive(bttn) {
    resetSlideBttns();
    bttn.style.background = '#0d3a3e';
    bttn.classList.add('active-slide');
    bttn.style.visibility = 'visible';

  }

  setSlideBttnActive(slideBttn1);

  function hideVisibility(slide) {
    slide.style.visibility = 'hidden';
  }

  function showVisibility(slide) {
    slide.style.visibility = 'visible';
  }


  bannerTl.to(b1, 0.75, { opacity: 0, onStart: setSlideBttnActive, onStartParams: [slideBttn2 ] }, 12);
  bannerTl.to(b2, 0.75, { opacity: 1, visibility: 'visible' }, 12);
  bannerTl.to(b2, 0.75, { opacity: 0, onStart: setSlideBttnActive, onStartParams: [slideBttn3 ],  onComplete: hideVisibility, onCompleteParams: [b2] }, 24);
  bannerTl.to(b3, 0.75, { opacity: 1, visibility: 'visible' }, 24);
  bannerTl.to(b3, 0.75, { opacity: 0,  onStart: setSlideBttnActive, onStartParams: [slideBttn1 ],  onComplete: hideVisibility, onCompleteParams: [b3]  }, 36);
  bannerTl.to(b1, 0.75, { opacity: 1, visibility: 'visible' }, 36);

  function resetSlideBttns() {
    slideButtons.forEach(function(bttn) {
      bttn.style.background = 'white';

      if(bttn.classList.contains('active-slide')) {
        bttn.classList.remove('active-slide');
      }
    });
  }

  (function() {
    slideBttn1.addEventListener('click', function() {
      bannerTl.pause();
      setSlideBttnActive(slideBttn1);
      b1.style.opacity = 1;
      b1.style.visibility = 'visible';
      b2.style.opacity = 0;
      b2.style.visibility = 'hidden';
      b3.style.opacity = 0;
      b3.style.visibility = 'hidden';
    });

    slideBttn2.addEventListener('click', function() {
      bannerTl.pause();
      setSlideBttnActive(slideBttn2);
      b1.style.opacity = 0;
      b1.style.visibility = 'hidden';
      b2.style.opacity = 1;
      b2.style.visibility = 'visible';
      b3.style.opacity = 0;
      b3.style.visibility = 'hidden';
    });

    slideBttn3.addEventListener('click', function() {
      bannerTl.pause();
      setSlideBttnActive(slideBttn3);
      b1.style.opacity = 0;
      b1.style.visibility = 'hidden';
      b2.style.opacity = 0;
      b2.style.visibility = 'hidden';
      b3.style.opacity = 1;
      b3.style.visibility = 'visible';
    });

  })();

}

if(pageClass.classList.contains('page-id-11')) {
  homeRotator();
}

function addCategoryLinkSidebar() {
  var sideBar = document.querySelector('#sidebar');
  var blogSidebar = document.querySelector('#categories-3 ul');
  var recipeSidebar = document.querySelector('#text-2 ul');
  var recipeIndexPage =  document.querySelector('.page-template-food-index-template ');
  var blogIndexPage =  document.querySelector('.page-template-blog-index-template');


  var item = document.createElement('li');
  var catList = document.querySelector('.category-list');
  var link = document.createElement('a');
  var hostRecipe = 'https://myfreewell.com/recipe/';
  var hostBlog = 'https://myfreewell.com//blog/';


  if(blogSidebar) {
    var blogLink = document.createElement('a');
    var blogItem = document.createElement('li');
    blogLink.textContent = 'All';
    blogLink.setAttribute('href', hostBlog);
    blogItem.appendChild(blogLink);
    blogSidebar.prepend(blogItem);
  }

  if(recipeSidebar) {
    var recipeLink = document.createElement('a');
    var recipeItem = document.createElement('li');
    recipeLink.textContent = 'All';
    recipeLink.setAttribute('href', hostRecipe);
    recipeItem.appendChild(recipeLink);
    recipeSidebar.prepend(recipeItem);
  }

  if(recipeIndexPage) {
    link.textContent = 'All';
    link.setAttribute('href', hostRecipe);
    item.appendChild(link);
    catList.prepend(item);
  }

  if(blogIndexPage) {
    link.textContent = 'All';
    link.setAttribute('href', hostBlog);
    item.appendChild(link);
    catList.prepend(item);
  }
  // if(catList) {
  //   // var host = location.hostname;
  //
  //   // host = host + '/' + 'myfreewell/blog/';
  //   // console.log(host);
  //   link.textContent = 'All';
  //   link.setAttribute('href', host);
  //   item.appendChild(link);
  //   catList.prepend(item);
  // }
}

addCategoryLinkSidebar();
