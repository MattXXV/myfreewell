var pageClass = document.querySelector('body');

function mobileToggleStyleAdjust() {
  var button = document.querySelector('.navbar-toggle');

  button.addEventListener('click', function() {
    var menuOpen = document.querySelector('.in');
    if(menuOpen) {
      button.style.backgroundColor = 'white';
    } else {
      button.style.backgroundColor = 'lightgray';
    }
  });
}
mobileToggleStyleAdjust();

window.onresize = mobileToggleStyleAdjust;

function footerMenu() {
  var upArrow = document.querySelector('.up-arrow');

  if(upArrow) {

    upArrow.addEventListener('click', function() {

      gsap.to(window,  {duration: 1, scrollTo: {y: -500, offsetY: 0}});
    });
  }
}
footerMenu();

function homeRotator() {
var bannerTl = gsap.timeline({ repeat: -1 });
var b1 = document.querySelector('.banner-one');
var b2 = document.querySelector('.banner-two');
var b3 = document.querySelector('.banner-three');

var slideButtons = document.querySelectorAll('.slide-bttn');
var slideBttn1 = document.querySelector('.slide1-bttn');
var slideBttn2 = document.querySelector('.slide2-bttn');
var slideBttn3 = document.querySelector('.slide3-bttn');

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
}
addCategoryLinkSidebar();

function addRecipePrintBttn() {
  if(pageClass.classList.contains('foods-template-default')) {
      var wrapper = document.querySelector('.sfsi_widget .norm_row.sfsi_wDiv');
      var bttnContainer = document.createElement('div');
      bttnContainer.className = 'print-button';
      bttnContainer.setAttribute('title', 'Print recipe page.')
      var printIcon = document.createElement('img');
      printIcon.setAttribute('src', '/wp-content/uploads/2020/05/print-bttn.png');
      bttnContainer.appendChild(printIcon);
      wrapper.appendChild(bttnContainer);

      bttnContainer.addEventListener('click', function () {
        var recipe = document.querySelector('.recipe-post').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = recipe;
        window.print();
        document.body.innerHTML = originalContents;
      })
  }
}
addRecipePrintBttn();

function insertBefore(newNode, existingNode) {
  existingNode.parentNode.insertBefore(newNode, existingNode);
}

function changeCommentsPositioning() {
  var comments = document.querySelector('#comments');
  var prependSection = document.querySelector('.home-sec-nine');
  if(pageClass.classList.contains('post-template-default') || pageClass.classList.contains('foods-template-default')) {

    if(comments) {
      insertBefore(comments, prependSection);
    }

  }
}
changeCommentsPositioning();
