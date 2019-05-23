/* 
| Author: thucxuong
| Dependencies: jQuery, jQuery Widget Factory (jqueryUI), Owl Carousel
*/

function camelize(str) {
  return str.replace(/(?:^\w|[A-Z]|\b\w)/g, function (letter, index) {
    return index == 0 ? letter.toLowerCase() : letter.toUpperCase();
  }).replace(/\s+/g, '');
}
$.widget("custom.dataOwlCarousel", {
  options: {
    nav: true,
    dots: true },

  _create: function () {
    this.options = this._parseOptions();
    this.element.owlCarousel(this.options);
  },
  _parseOptions: function () {
    var availOwlOptions = ["items", "margin", "loop", "center", "mouseDrag", "touchDrag", "pullDrag", "freeDrag", "stagePadding", "merge", "mergeFit", "autoWidth", "startPosition", "URLhashListener", "nav", "rewind", "navElement", "slideBy", "dots", "dotsEach", "dotData", "lazyLoad", "lazyContent", "autoplay", "autoplayTimeout", "autoplayHoverPause", "smartSpeed", "fluidSpeed", "autoplaySpeed", "navSpeed", "dotsSpeed", "dragEndSpeed", "callbacks", "responsiveRefreshRate", "video", "videoHeight", "videoWidth", "animateOut", "animateInClass", "fallbackEasing", "nestedItemSelector", "itemElement", "stageElement", "navContainer", "dotsContaine", "dotClass", "equalize"];
    var data = this.element.data();
    var finalOptions = {};
    $.each(data, function (k, v) {
      var realOptionName = k.replace('owl', '');
      realOptionName = camelize(realOptionName);
      if (availOwlOptions.indexOf(realOptionName) >= 0) {
        finalOptions[realOptionName] = v;
      }
    });

    var rwdOptions = {};
    if (data.rwd != null) {
      var itemsArr = data.rwd.split('-');
      rwdOptions = {
        responsive: {
          0: {
            items: itemsArr[0],
            mouseDrag: false,
            touchDrag: true },

          768: {
            items: itemsArr[1],
            mouseDrag: false,
            touchDrag: true },

          1024: {
            items: itemsArr[2],
            mouseDrag: true,
            touchDrag: false },

          1200: {
            items: itemsArr[3],
            mouseDrag: true,
            touchDrag: false } } };



    }
    ;
    return $.extend(true, {}, rwdOptions, this.options, finalOptions);
  },
  _destroy: function () {
    this.element.
    removeClass("progressbar").
    text("");
  } });


var owl = $('.owl-carousel');
owl.owlCarousel({
    items:5,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:false
});
