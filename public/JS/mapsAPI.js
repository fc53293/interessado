// Create the script tag, set the appropriate attributes
var script = document.createElement('script');
const keyAPI = 'AIzaSyDvB44JuRBOeKdebKIuuqs8kXiW36EjQns';
script.src = 'https://maps.googleapis.com/maps/api/js?key=' + keyAPI + '&callback=initMap';
script.async = true;

// Attach your callback function to the `window` object
window.initMap = function() {
  // JS API is loaded and available
};

// Append the 'script' element to 'head'
document.head.appendChild(script);