$( document ).ready(function() {
  console.log( "ready!" );
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