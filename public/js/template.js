(function() {
  'use strict';
  document.addEventListener('DOMContentLoaded', function() {
    var sidebar = document.querySelector('.sidebar');
    if (!sidebar) return;
    var links = sidebar.querySelectorAll('.nav li a');
    var currentPath = window.location.pathname;
    links.forEach(function(link) {
      var href = link.getAttribute('href');
      if (!href) return;
      if (currentPath === href || (href !== '/' && currentPath.startsWith(href))) {
        var navItem = link.closest('.nav-item');
        if (navItem) navItem.classList.add('active');
        var collapse = link.closest('.collapse');
        if (collapse) collapse.classList.add('show');
        link.classList.add('active');
        link.classList.add('nav-link'); // Đảm bảo luôn có class nav-link để tô màu
      }
    });
  });
})();

// focus input when clicking on search icon
document.querySelector('#navbar-search-icon').addEventListener('click', function() {
  document.querySelector("#navbar-search-input").focus();
});
if ($.cookie('royal-free-banner')!="true") {
  var proBanner = document.querySelector('#proBanner');
  if (proBanner) proBanner.classList.add('d-flex');
  var navbar = document.querySelector('.navbar');
  if (navbar) navbar.classList.remove('fixed-top');
}
else {
  var proBanner = document.querySelector('#proBanner');
  if (proBanner) proBanner.classList.add('d-none');
  var navbar = document.querySelector('.navbar');
  if (navbar) navbar.classList.add('fixed-top');
}

if ($('.navbar').hasClass('fixed-top')) {
  var pageBody = document.querySelector('.page-body-wrapper');
  if (pageBody) pageBody.classList.remove('pt-0');
  var navbar = document.querySelector('.navbar');
  if (navbar) navbar.classList.remove('pt-5');
}
else {
  var pageBody = document.querySelector('.page-body-wrapper');
  if (pageBody) pageBody.classList.add('pt-0');
  var navbar = document.querySelector('.navbar');
  if (navbar) {
    navbar.classList.add('pt-5');
    navbar.classList.add('mt-3');
  }
}
var bannerClose = document.querySelector('#bannerClose');
if (bannerClose && proBanner && navbar && pageBody) {
  bannerClose.addEventListener('click',function() {
    proBanner.classList.add('d-none');
    proBanner.classList.remove('d-flex');
    navbar.classList.remove('pt-5');
    navbar.classList.add('fixed-top');
    pageBody.classList.add('proBanner-padding-top');
    navbar.classList.remove('mt-3');
    var date = new Date();
    date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
    $.cookie('royal-free-banner', "true", { expires: date });
  });
}
