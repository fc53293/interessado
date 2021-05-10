$( document ).ready(function() {
  console.log( "ready!" );

  var slider = document.getElementById("myRange");
  var output = document.getElementById("priceFilter");
  var output2 = document.getElementById("priceFilter2");
  output.innerHTML = slider.value;
  output2.innerHTML = slider.innerHTML;
  slider.oninput = function() {
    output.innerHTML = this.value;
    output2.value = output.innerHTML;
  }
});

$(".js-range-slider").ionRangeSlider({
  type: "double",
  min: 0,
  max: 1000,
  from: 200,
  to: 500,
  grid: true
});

$("#rangePrimary").on("change", function () {
  var $this = $(this),
      value = $this.prop("value").split(";");
      var minPrice = value[0];
      var maxPrice = value[1];
      $("#priceRangeSelected").text("Lower Price Range = £" + minPrice + " , Upper Price Range = £" + maxPrice);
});




