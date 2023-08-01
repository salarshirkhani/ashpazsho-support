// ///new search box 
// var isSearchBoxVisible = false;
// var searchBox = document.getElementById("searchbox");
// var skipClose;

// function toggleSearchBox() {
//   showSearchBox(!isSearchBoxVisible);
//   skipCloseFn();
// }

// function showSearchBox(show=true){
//    searchBox.style.display = show ? '' : 'none'; 
//    isSearchBoxVisible = show;
// }

// function skipCloseFn(){
//   skipClose = true;
// }

// showSearchBox(false);

// // This can be directly given in HTML as well as given for outer search icon.
// searchBox.querySelector('input').addEventListener('click', skipCloseFn);
// //Can be included only if necessary
// searchBox.querySelector('button').addEventListener('click', function(e){
//   e.preventDefault();
//   skipCloseFn();
// });


// document.addEventListener('click', function(){
//   if(!skipClose){
//     showSearchBox(false);
//   }
//   skipClose = false;
// });
// /////////////////////////////////end search box



window.onscroll = function() {headerscrollFunction()};

// Get the header
var header = document.getElementById("myHeader");
var searchbox = document.getElementById("input");
// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function headerscrollFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    searchbox.classList.add("sticky2");
  } else {
    header.classList.remove("sticky");
    searchbox.classList.remove("sticky2");
  }
}


///menu-bar-mobile js
const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu');
        
let showMenu = false;
        
menuBtn.addEventListener('click', toggleMenu);
        
function toggleMenu() {
  if (!showMenu) {
    menu.classList.add('show');
    showMenu = true;
  } 
  else {
    menu.classList.remove('show');
    showMenu = false;
  }
}
// ////////////////////////////////////  



// show more code 

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  const contentFull = document.getElementById('contentFull');
  var img = document.createElement("img");
  img.src = "img/noun-scroll-down-2623546.png";

  if (contentFull.style.height === '200px') {
    btnText.innerHTML = "مشاهده کمتر"+"	&#8679"; 
    
    moreText.style.display = "none";
    document.querySelector('.myB').style.display = "none";
    contentFull.style.height = 'auto';
    
  } else {
    btnText.innerHTML = "مشاهده بیشتر";
    btnText.appendChild(img).style.width ="18px";
    btnText.appendChild(img);
    moreText.style.display = "contents";
    
    document.querySelector('.myB').style.display = "block";
    contentFull.style.height = '200px';
    contentFull.style.overflow = 'hidden';
  }
}


////////////////////////////////////////
$('.banner-site').flickity({
  rightToLeft: true,
  contain: true,
  pageDots: false,
  freeScroll: true,
  autoPlay: false,
  cellAlign: 'center'
});

$('.banner-p5').flickity({
  rightToLeft: true,
  contain: true,
  pageDots: false,
  freeScroll: true,
  autoPlay: false,
  prevNextButtons: false,
  cellAlign: 'center'
});

$('.Advertising-p6').flickity({
  rightToLeft: true,
  contain: true,
  pageDots: true,
  freeScroll: true,
  autoPlay: true,
  prevNextButtons: false,
  cellAlign: 'right'
});


const the_animation = document.querySelectorAll('.animation')

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('scroll-animation')
        }
            else {
                entry.target.classList.remove('scroll-animation')
            }
        
    })
},
   { threshold: 0.5
   });
//
  for (let i = 0; i < the_animation.length; i++) {
   const elements = the_animation[i];

    observer.observe(elements);
  } 