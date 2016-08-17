function Circle(options) {
  options = options || {};
  this.radius = options.radius || 5;
  this.position = options.position || {x: 0, y: 0};
  this.color =  options.color || 0x000000;
  this.color_active =  options.color_active || 0x000000;
  this.fillAlpha =  options.fillAlpha || 0.9;
  this.fillAlpha_active =  options.fillAlpha_active || 0.5;
}
function Director(width, height, options) {
  this.now;
  this.dt;
  this.then = Date.now();
  
  options = options || {};
  this.WIDTH = width || 640;
  this.HEIGHT = height || 480;
}

Director.prototype.animate = function() {
  // don't override!
  this.now = Date.now();
  this.dt = this.now - this.then;

  requestAnimationFrame(this.animate.bind(this));
  this.updateAndRender(this.dt);
  
  this.then = this.now;
};

Director.prototype.updateAndRender = function(dt) {
  // must override!
  this.update(dt);
  this.render();
};

Director.prototype.update = function(dt) {
  // must override!
};

Director.prototype.render = function() {
  // must override!
};


function Slide(width, height, img_src, img, is_left) {
  this.width = width/2 || 640;
  this.height = height || 480;
  this.width_cached = this.width;
  this.height_cached = this.height;
  this.height = height;
  this.img_src = img_src;
  this.img = img || null;
  
  
  this.is_left = is_left ? true : false;
  
this.cached_width = this.width;
  this.anchor = {x: 0.5, y: 0.5};
  this.position = {x: 0, y: 0};
  this.cached_position = {x: 0, y: 0};
  this.temp_position = {x: 0, y: 0};
}

Slide.prototype.cache_width = function() {
  this.cached_width = this.width;
};

Slide.prototype.cache_position = function() {
  this.cached_position.x = this.position.x;
  this.cached_position.y = this.position.y;
};

Slide.prototype.restoreCachedWidth = function() {
  this.width = this.cached_width;
};

Slide.prototype.restoreCachedPosition = function() {
  this.position.x = this.cached_position.x;
  this.position.y = this.cached_position.y;
};

Slide.prototype.saveTempPosition = function() {
  this.temp_position.x = this.position.x;
  this.temp_position.y = this.position.y;
};

Slide.prototype.cache_size = function() {
  this.width_cached = this.width;
  this.height_cached = this.height;
};

SlideManagerBase.prototype = Object.create(Director.prototype);

function SlideManagerBase(width, height, options) {
  Director.call(this, width, height, options);
  options = options || {};
  this.SLIDE_DURATION = options.slide_duration || 300;
  this.SLIDE_PERCENT_Y = options.slide_percent_y || 0.5;
  // SLIDE_PERCENT_Y only effect when scale is CROP
  this.CIRCLE_COLOR = options.indicator_color || 0x000000;
  this.CIRCLE_COLOR_ACTIVE = options.indicator_color_active || 0x000000;
  this.CIRCLE_FILLALPHA = options.indicator_fillAlpha || 0.9;
  this.CIRCLE_FILLALPHA_ACTIVE = options.indicator_fillAlpha_active || 0.5;
  this.CIRCLE_RADIUS = options.indicator_radius || 8;
  this.CIRCLE_MARGIN = options.indicator_margin || 25;
  this.CIRCLE_PERCENT_Y = options.indicator_percent_y || 0.9;
  this.BKG_COLOR = options.bkg_color || 0x000000;
  this.scale = options.scale || this.SCALES.FIT;
  
  this.animationDuration = 4.5;

  this.has_indicators = options.has_indicators || true;
  this.speed = this.WIDTH / this.SLIDE_DURATION;
  this.is_accelerated = options.is_accelerated || false;
  this.initial_speed = this.is_accelerated ? (2 * this.WIDTH / this.SLIDE_DURATION) : this.speed;
  this.acceleration = this.is_accelerated ? (this.initial_speed / this.SLIDE_DURATION) : 0;

  this.is_auto_slide = (options.is_auto_slide == true) ? true : false;
  this.interval = options.interval || 1000;

  this.zoom_ratio = options.zoom_ratio || 2;
  this.zoom_interval = options.zoom_interval || 300;
this.position = "neutral";
  this.states = {
    still: {duration: null},
    sliding_left: {duration: this.SLIDE_DURATION},
    sliding_right: {duration: this.SLIDE_DURATION},
    zoomming_in: {},
    zoomming_out: {},
    inspecting: {}
  };
  this.state = this.states.still;
  this.state_time = 0;
  this.slides = [];
  this.slide_count = 0;
  this.indicators = [];

  this.is_position_adjusted = false;

  this.onInit = options.onInit || null;
  this.onSlideBegin = options.onSlideBegin || null;
  this.onSlideEnd = options.onSlideEnd || null;
}

SlideManagerBase.prototype.getZoomedLength = function (length_cached, state_time) {
  return 0.37 * length_cached * Math.log(state_time + (1 + Math.sqrt(1 + 4 * this.zoom_interval)) / 2);
};

SlideManagerBase.prototype.zoomIn = function () {
  if (this.state !== this.states.still) {
    return;
  }
  this.state = this.states.zoomming_in;
  this.state_time = 0;
  var slide = this.getActiveSlide();
  if (slide) {
    slide.cache_position();
    slide.saveTempPosition();
    slide.cache_size();
  }
};

SlideManagerBase.prototype.zoomOut = function () {
  if (this.state !== this.states.inspecting) {
    return;
  }
  var slide = this.getActiveSlide();
  if (slide) {
    slide.restoreCachedPosition();
  }
  this.state = this.states.zoomming_out;
  this.state_time = 0;
};

SlideManagerBase.prototype.update = function (dt) {
  Director.prototype.update.call(this, dt);
  if (this.slide_count < 2) {
    return;
  }

  this.state_time += dt;
  switch (this.state) {
    case this.states.still:
      if (this.is_auto_slide === true && this.state_time > this.interval) {
        this.slideLeft();
      }
      break;
    case this.states.zoomming_in:
      if (this.state_time > this.zoom_interval) {
        this.state = this.states.inspecting;
        this.state_time = 0;
      } else {
        var slide = this.getActiveSlide();
        slide.width = this.getZoomedLength(slide.width_cached, this.state_time);
        slide.height = this.getZoomedLength(slide.height_cached, this.state_time);
      }
      break;
    case this.states.zoomming_out:
      var slide = this.getActiveSlide();
      if (this.state_time > this.zoom_interval) {
        this.state = this.states.still;
        this.state_time = 0;
        slide.width = slide.width_cached;
        slide.height = slide.height_cached;
      } else {
        slide.width = 3 * slide.width_cached - this.getZoomedLength(slide.width_cached, this.state_time);
        slide.height = 3 * slide.height_cached - this.getZoomedLength(slide.height_cached, this.state_time);
      }
      break;
    case this.states.inspecting:
    default:
      // sliding
      /*if (this.state_time > this.state.duration) {
//      this.is_position_adjusted = false;
//      this.adjustPosition();
        // sliding finished
        if (this.onSlideEnd) {
          this.onSlideEnd();
        }
        var active_slide = this.getActiveSlide();
        var offset = this.WIDTH / 2 - active_slide.position.x;
        for (var i = 0; i < this.slide_count; i++) {
          this.slides[i].position.x += offset;
        }
        this.state = this.states.still;
        this.state_time = this.state_time - this.state.duration;
        this.adjustCircles();
      } else {*/
        // sliding not finished
        switch (this.state) {
          case this.states.sliding_left:
            this.updateSliding(dt);
            break;
          case this.states.sliding_right:
            this.updateSliding(dt);
            break;
          default:
            break;
        }
        this.adjustPosition();
      //}
      break;
  }
};

SlideManagerBase.prototype.updateSliding = function (dt) {
  var sign = this.state === this.states.sliding_left ? -1 : 1;
  for (var i = 0; i < this.slide_count; i++) {
    //var delta_s = this.initial_speed * this.state_time - 0.5 * this.acceleration * Math.pow(this.state_time, 2);
  
    var t = (dt) / ( this.animationDuration*1000 );
    
    var Bx = 0.61,
        By = 0.08,
        Cx = 0.59,
        Cy = 1.01;

    var curve = new UnitBezier(Bx, By, Cx, Cy);
    var t1 = curve.solve(t, UnitBezier.prototype.epsilon);
    var s1 = 1.0-t1;

    // Lerp using solved T
    this.slides[i].position.x = (this.slides[i].startPosition.x * s1) + (this.slides[i].endPosition.x * t1);
    
    if(Math.abs(this.slides[i].position.x - this.slides[i].startPosition.x ) 
            >= Math.abs(this.slides[i].endPosition.x - this.slides[i].startPosition.x )) {
        // end animation.
        this.slides[i].position.x = this.slides[i].endPosition.x;
        this.state = this.states.still;
    }
    
    //var finalPosition.y = (startPosition.y * s1) + (endPosition.y * t1);
    
    //this.slides[i].position.x = this.slides[i].cached_position.x + sign * delta_s;
    // Active Slide get bigger
    //if (this.slides[i].to_bigger) {
      //  this.slides[i].width = this.slides[i].cached_width + delta_s;
    //}
    // Disactive Slide get smaller
    //if (this.slides[i].to_smaller) {
      //  this.slides[i].width = this.slides[i].cached_width - delta_s;
    //}
  }
};

SlideManagerBase.prototype.getSpeed = function () {
  if (this.state === this.states.still) {
    return 0;
  }

  if (this.is_accelerated) {
    return this.initial_speed - this.acceleration * this.state_time;
  } else {
    return this.initial_speed;
  }
};

SlideManagerBase.prototype.getActiveSlide = function () {
  // the nearest slide
  if (!this.slides.length) {
    return false;
  }
  var slide = this.slides.reduce(function (s1, s2) {
    return Math.abs(s1.position.x - this.WIDTH / 2) < Math.abs(s2.position.x - this.WIDTH / 2) ? s1 : s2;
  }.bind(this));
  return slide;
};

SlideManagerBase.prototype.getActiveSlides = function () {
  // the nearest slide
  
  if (!this.slides.length) {
    return false;
  }
  var activeslides = {};
  this.slides.forEach(function(slide) {
    if(slide.is_active && slide.is_left) 
        activeslides.left = slide;
    else if(slide.is_active) 
        activeslides.right = slide;
});
  return activeslides;
};

SlideManagerBase.prototype.getActiveIndex = function () {
  if (!this.slides.length) {
    return false;
  }
  // the nearest slide
  return this.slides.indexOf(this.getActiveSlide());
};

SlideManagerBase.prototype.adjustCircles = function () {
  var active_index = this.slides.indexOf(this.getActiveSlide());
  for (var i = 0, len = this.indicators.length; i < len; i++) {
    this.indicators[i].color = this.CIRCLE_COLOR;
    this.indicators[i].fillAlpha = this.CIRCLE_FILLALPHA;
  }
  this.indicators[active_index].color = this.CIRCLE_COLOR_ACTIVE;
  this.indicators[active_index].fillAlpha = this.CIRCLE_FILLALPHA_ACTIVE;
};

SlideManagerBase.prototype.adjustPosition = function () {
 return;
    if (this.is_position_adjusted) {
    return;
  }
  var left_slide = this.slides.reduce(function (s1, s2) {
    return s1.position.x < s2.position.x ? s1 : s2;
  }.bind(this));
  var right_slide = this.slides.reduce(function (s1, s2) {
    return s1.position.x > s2.position.x ? s1 : s2;
  }.bind(this));
  if (this.state === this.states.sliding_left && left_slide.position.x < this.WIDTH / 2 && left_slide !== this.getActiveSlide()) {
    left_slide.position.x = right_slide.position.x + this.WIDTH;
    left_slide.cached_position.x = right_slide.cached_position.x + this.WIDTH;
  } else if (this.state === this.states.sliding_right && right_slide.position.x > this.WIDTH / 2 && right_slide !== this.getActiveSlide()) {
    right_slide.position.x = left_slide.position.x - this.WIDTH;
    right_slide.cached_position.x = left_slide.cached_position.x - this.WIDTH;
  }
  this.is_position_adjusted = true;
};

SlideManagerBase.prototype.slideLeft = function () {
  if(this.position === "left"){
      return;
  } 
  var slides = this.getActiveSlides();
  if(this.position === "neutral") {
    this.position = "left";
    slides.left.to_smaller = false; 
    slides.right.to_bigger = true;
  }
  else if  (this.position  === "right") {
    this.position = "neutral";
    slides.left.to_smaller = true; 
    slides.right.to_bigger = false;
  }
  
  slides.left.startPosition = {
              x : slides.left.position.x
  };
  slides.left.endPosition = {
                x: slides.left.position.x - this.WIDTH/2
  };
  slides.right.startPosition = {
              x: slides.right.position.x
  };
  slides.right.endPosition = {
      x: slides.right.position.x - this.WIDTH/2
  } ;
  
  
  if (this.state !== this.states.still) {
    return;
  }
  if (this.onSlideBegin) {
    this.onSlideBegin();
  }
  this.is_position_adjusted = false;
  this.cache_slide_positions();
  this.state = this.states.sliding_left;
  this.state_time = 0;
 
};

SlideManagerBase.prototype.slideRight = function () {
  if(this.position === "right"){
      return;
  }
  var slides = this.getActiveSlides();
  if(this.position === "neutral"){
    this.position = "right";
    slides.left.to_bigger = true; 
    slides.right.to_smaller = false;
  }
  else if  (this.position  === "left"){
    this.position = "neutral";
    slides.left.to_bigger = false;     
    slides.right.to_smaller = true;
    }
    slides.left.startPosition = {
            x: slides.left.position.x
    };
    slides.left.endPosition = {
            x : slides.left.position.x + this.WIDTH/2
    } 
    slides.right.startPosition  = { 
            x: slides.right.position.x
    }
    slides.right.endPosition = {
                x: slides.right.position.x + this.WIDTH/2
    } 

  if (this.state !== this.states.still) {
    return;
  }
  if (this.onSlideBegin) {
    this.onSlideBegin();
  }
  this.is_position_adjusted = false;
  this.cache_slide_positions();
  this.state = this.states.sliding_right;
  this.state_time = 0;
 
};

SlideManagerBase.prototype.panTo = function (x, y) {
  if (this.state !== this.states.inspecting) {
    return;
  }
  var slide = this.getActiveSlide();
  if (slide) {
    if (x - 0.5 * slide.width >= 0 || x + 0.5 * slide.width <= this.WIDTH) {
    } else {
      slide.position.x = x;
    }
    if (y - 0.5 * slide.height >= 0 || y + 0.5 * slide.height <= this.HEIGHT) {
    } else {
      slide.position.y = y;
    }
  }
};

SlideManagerBase.prototype.startAutoSlide = function (interval) {
  this.interval = interval || this.interval;
  this.is_auto_slide = true;
};

SlideManagerBase.prototype.stopAutoSlide = function () {
  this.is_auto_slide = false;
};

SlideManagerBase.prototype.cache_slide_positions = function () {
  for (var i = 0; i < this.slide_count; i++) {
    this.slides[i].cache_position();
  }
};

SlideManagerBase.prototype.setSlidesAndStart = function (img_srcs, options) {
  this.setSlides(img_srcs, options);
  this.init();
  this.animate();
};

SlideManagerBase.prototype.setSlides = function (img_srcs_left , img_srcs_right , options) {
  options = options || {};
  var width = options.width || this.WIDTH;
  var height = options.height || this.HEIGHT;
  if(img_srcs_left.length != img_srcs_right.length)
      return;
  this.slide_count = img_srcs_left.length + img_srcs_right.length;
  for (var i = 0; i < this.slide_count; i++) {
    if (typeof (img_srcs_left[i]) === 'string') {
      this.slides.push(new Slide(width, height, img_srcs_left[i], null,true));
      this.slides.push(new Slide(width, height, img_srcs_right[i], null,false));
    } else {
      this.slides.push(new Slide(width, height, null, img_srcs_left[i],true));
      this.slides.push(new Slide(width, height, null, img_srcs_right[i],false));
    }
  }
};

SlideManagerBase.prototype.init = function () {
  // position slides and indicators
  var len = this.slide_count;
  var left_indicator_x = this.WIDTH / 2 - (len - 1) * this.CIRCLE_MARGIN / 2;
  for (var i = 0; i < len; i++) {
    var slide = this.slides[i];

//    slide.width = this.WIDTH;
//    slide.height = this.HEIGHT;
    slide.anchor.x = 0.5;
    slide.anchor.y = 0.5;
    if(slide.is_left)
     slide.position.x = this.WIDTH / 4; // + i * this.WIDTH;
    else 
     slide.position.x = this.WIDTH * 3 / 4; // + i * this.WIDTH;
 
 slide.is_active = true;
    slide.position.y = this.HEIGHT * this.SLIDE_PERCENT_Y;

    switch (this.scale) {
      case this.SCALES.STRETCH:
        slide.width = this.WIDTH;
        slide.height = this.HEIGHT;
        slide.position.y = this.HEIGHT * 0.5;
      case this.SCALES.FIT:
        var aspRatio = slide.width / slide.height;
        if (aspRatio > this.WIDTH / this.HEIGHT) {
          slide.width = this.WIDTH;
          slide.height = slide.width / aspRatio;
        } else {
          slide.height = this.HEIGHT;
          slide.width = slide.height * aspRatio;
        }
      case this.SCALES.CROP:
      default:
    }

    var indicator = new Circle({
      radius: this.CIRCLE_RADIUS,
      position: {x: left_indicator_x + this.CIRCLE_MARGIN * i, y: this.HEIGHT * this.CIRCLE_PERCENT_Y},
      color: i === 0 ? this.CIRCLE_COLOR_ACTIVE : this.CIRCLE_COLOR,
      fillAlpha: i === 0 ? this.CIRCLE_FILLALPHA_ACTIVE : this.CIRCLE_FILLALPHA,
    });
    this.indicators.push(indicator);
  }
  if (this.onInit) {
    this.onInit();
  }
};

SlideManagerBase.prototype.SCALES = {
  CROP: {},
  STRETCH: {},
  FIT: {}
};
SlideManager.prototype = Object.create(SlideManagerBase.prototype);

function SlideManager(width, height, options) {
  SlideManagerBase.call(this, width, height, options);
  this.textures = [];
  this.sprites = [];
  this.graphics = new PIXI.Graphics();
//  this.stage = new PIXI.Stage(this.BKG_COLOR);   // pixi 2
  this.stage = new PIXI.Container();
//  this.renderer = new PIXI.CanvasRenderer(width, height, {view: options.view}, true);
  this.renderer = PIXI.autoDetectRenderer(width, height, {view: options.view, backgroundColor: this.BKG_COLOR});   // pixi 3

  this.hammertime = new Hammer(options.view);
  this.hammertime.get('swipe').set({direction: Hammer.DIRECTION_HORIZONTAL});
  this.hammertime.get('pan').set({direction: Hammer.DIRECTION_HORIZONTAL, threshold: 100});
}

SlideManager.prototype.render = function () {
//  SlideManagerBase.prototype.render.call(this);
  if (this.has_indicators) {
    this.renderIndicators();
  }
  for (var i = 0, len = this.slide_count; i < len; i++) {
    var sl = this.slides[i];
    var sp = this.sprites[i];
    sp.width = sl.width;
    sp.height = sl.height;
  }
  this.renderer.render(this.stage);
};

SlideManager.prototype.renderIndicators = function () {
  this.graphics.clear();
  var len = this.indicators.length;
  if (len > 1) {
    for (var i = 0; i < len; i++) {
      var cir = this.indicators[i];
      this.graphics.beginFill(cir.color);
      this.graphics.fillAlpha = cir.fillAlpha;
      this.graphics.drawCircle(cir.position.x, cir.position.y, cir.radius);
      this.graphics.endFill();
    }
  }
};

SlideManager.prototype.init = function () {
  SlideManagerBase.prototype.init.call(this);
  for (var i = 0, len = this.slide_count; i < len; i++) {
    var sl = this.slides[i];
    if (sl.img) {
      var basetex = new PIXI.BaseTexture(sl.img);
      var tex = new PIXI.Texture(basetex);
    } else {
      var tex = PIXI.Texture.fromImage(sl.img_src);
    }
    this.textures.push(tex);
    var sp = new PIXI.Sprite(tex);
    sp.width = sl.width;
    sp.height = sl.height;
    sp.anchor = sl.anchor;
    sp.position = sl.position;
    this.sprites.push(sp);
    this.stage.addChild(sp);

    if (this.has_indicators) {
      var cir = this.indicators[i];
      this.graphics.beginFill(0xFFFFFF);
      this.graphics.fillAlpha = cir.fillAlpha;
      this.graphics.drawCircle(cir.position.x, cir.position.y, cir.radius);
      this.graphics.endFill();
    }
    this.stage.addChild(this.graphics);
  }
  //this.graphics.lineStyle(0, 0x000000, 1);
};

SlideManager.prototype.enableSwipe = function () {
  this.hammertime.on('swipeleft panleft', function (ev) {
    this.slideLeft();
  }.bind(this));
  this.hammertime.on('swiperight panright', function (ev) {
    this.slideRight();
  }.bind(this));
  var that = this;
  var onKeyDown = function (key) {
    
        // A Key is 65
        // Left arrow is 37
            
        if (key.keyCode === 65 || key.keyCode === 37 ) {
            that.slideLeft();
        }

        // D Key is 68
        // Right arrow is 39
        if (key.keyCode === 68 || key.keyCode === 39 ) {
           that.slideRight();
        }
    };
    // Add the 'keydown' event listener to our document
    document.addEventListener('keydown', onKeyDown);

SlideManager.prototype.enableZoom = function () {
  this.hammertime.on('tap', function (ev) {
    if (this.state === this.states.inspecting) {
      this.hammertime.get('pan').set({direction: Hammer.DIRECTION_HORIZONTAL, threshold: 100});
      this.zoomOut();
    } else {
      this.hammertime.get('pan').set({direction: Hammer.DIRECTION_ALL, threshold: 1});
      this.zoomIn();
    }
  }.bind(this));
  this.hammertime.on('pan', function (ev) {
    var slide = this.getActiveSlide();
    if (slide) {
      if (this.state !== this.states.inspecting) {
        return;
      }
      ev.preventDefault();
      this.panTo(slide.temp_position.x + ev.deltaX, slide.temp_position.y + ev.deltaY);
    }
  }.bind(this));
  this.hammertime.on('panend', function (ev) {
    var slide = this.getActiveSlide();
    if (slide) {
      slide.saveTempPosition();
    }
  }.bind(this));
};

};



/**
* Solver for cubic bezier curve with implicit control points at (0,0) and (1.0, 1.0)
*/
function UnitBezier(p1x, p1y, p2x, p2y) {
    // pre-calculate the polynomial coefficients
    // First and last control points are implied to be (0,0) and (1.0, 1.0)
    this.cx = 3.0 * p1x;
    this.bx = 3.0 * (p2x - p1x) - this.cx;
    this.ax = 1.0 - this.cx -this.bx;

    this.cy = 3.0 * p1y;
    this.by = 3.0 * (p2y - p1y) - this.cy;
    this.ay = 1.0 - this.cy - this.by;
}

UnitBezier.prototype.epsilon = 1e-6; // Precision  
UnitBezier.prototype.sampleCurveX = function(t) {
    return ((this.ax * t + this.bx) * t + this.cx) * t;
}
UnitBezier.prototype.sampleCurveY = function (t) {
    return ((this.ay * t + this.by) * t + this.cy) * t;
}
UnitBezier.prototype.sampleCurveDerivativeX = function (t) {
    return (3.0 * this.ax * t + 2.0 * this.bx) * t + this.cx;
}


UnitBezier.prototype.solveCurveX = function (x, epsilon) {
    var t0; 
    var t1;
    var t2;
    var x2;
    var d2;
    var i;

    // First try a few iterations of Newton's method -- normally very fast.
    for (t2 = x, i = 0; i < 8; i++) {
        x2 = this.sampleCurveX(t2) - x;
        if (Math.abs (x2) < epsilon)
            return t2;
        d2 = this.sampleCurveDerivativeX(t2);
        if (Math.abs(d2) < epsilon)
            break;
        t2 = t2 - x2 / d2;
    }

    // No solution found - use bi-section
    t0 = 0.0;
    t1 = 1.0;
    t2 = x;

    if (t2 < t0) return t0;
    if (t2 > t1) return t1;

    while (t0 < t1) {
        x2 = this.sampleCurveX(t2);
        if (Math.abs(x2 - x) < epsilon)
            return t2;
        if (x > x2) t0 = t2;
        else t1 = t2;

        t2 = (t1 - t0) * .5 + t0;
    }

    // Give up
    return t2;
}

// Find new T as a function of Y along curve X
UnitBezier.prototype.solve = function (x, epsilon) {
    return this.sampleCurveY( this.solveCurveX(x, epsilon) );
}