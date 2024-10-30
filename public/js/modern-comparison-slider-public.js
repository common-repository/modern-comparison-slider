(function ($) {
  "use strict";

  $(function () {
    var viewers = document.querySelectorAll(".image-compare-viewer");

    var globalConfig = {
      controlShadow: mcswp.controlShadow === "on" ? true : false,
      addCircle: mcswp.addCircle === "circle" ? true : false,
      controlColor: mcswp.controlColor,
      startingPoint: parseInt(mcswp.startingPoint),
      smoothing: mcswp.smoothing === "on" ? true : false,
      hoverStart: mcswp.hoverStart === "on" ? true : false,
      smoothingAmount: parseInt(mcswp.smoothingAmount),
    };

    var datasetDictionary = {
      shadow: "controlShadow",
      theme: "addCircle",
      color: "controlColor",
      startingpoint: "startingPoint",
      hoverstart: "hoverStart",
      smoothing: "smoothing",
      smoothingamount: "smoothingAmount",
    };

    for (var i = 0; i <= viewers.length - 1; i++) {
      var view = viewers[i].dataset;

      var config = {
        controlShadow: getData(view, "shadow") === "false" ? false : true,
        addCircle:
          getData(view, "theme") === "circle" || getData(view, "theme") === true
            ? true
            : false,
        controlColor: getData(view, "color"),
        startingPoint: parseInt(getData(view, "startingpoint")),
        hoverStart: getData(view, "hoverstart") === "true" ? true : false,
        smoothing: getData(view, "smoothing") === "false" ? false : true,
        smoothingAmount: parseInt(getData(view, "smoothingamount")),
      };

      new ImageCompare(viewers[i], config).mount();
    }

    function getData(view, datasetName) {
      return view.hasOwnProperty(datasetName)
        ? view[datasetName]
        : globalConfig[datasetDictionary[datasetName]];
    }
  });
})(jQuery);
