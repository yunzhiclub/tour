jssor_1_slider_init = function() {

var jssor_1_SlideshowTransitions = [
  {$Duration:1200,$Opacity:2}
];

var jssor_1_options = {
  $AutoPlay: true,
  $SlideshowOptions: {
    $Class: $JssorSlideshowRunner$,
    $Transitions: jssor_1_SlideshowTransitions,
    $TransitionsOrder: 1
  },
  $ArrowNavigatorOptions: {
    $Class: $JssorArrowNavigator$
  },
  $BulletNavigatorOptions: {
    $Class: $JssorBulletNavigator$
  }
};

var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

/*responsive code begin*/
/*remove responsive code if you don't want the slider scales while window resizing*/
function ScaleSlider() {
    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
    if (refSize) {
        refSize = Math.min(refSize, 600);
        jssor_1_slider.$ScaleWidth(refSize);
    }
    else {
        window.setTimeout(ScaleSlider, 30);
    }
}
ScaleSlider();
$Jssor$.$AddEvent(window, "load", ScaleSlider);
$Jssor$.$AddEvent(window, "resize", ScaleSlider);
$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
/*responsive code end*/
};