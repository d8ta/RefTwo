/**
 * Require plugins
 */
var autoprefixer   = require('gulp-autoprefixer');
var del            = require('del');
var gulp           = require('gulp');
var iconfont       = require('gulp-iconfont');
var iconfontCss    = require('gulp-iconfont-css');
var imagemin       = require('gulp-imagemin');
var include        = require('gulp-include');
var livereload     = require('gulp-livereload');
var mainBowerFiles = require('gulp-main-bower-files');
var notify         = require("gulp-notify");
var plumber        = require('gulp-plumber');
var rename         = require('gulp-rename');
var runSequence    = require('run-sequence');
var sass           = require('gulp-sass');
var sourcemaps     = require('gulp-sourcemaps');
var uglify         = require('gulp-uglify');
var filter         = require('gulp-filter');

/* ======== Variables ======== */
var paths = {
  prefix: {
    dist: 'htdocs/assets/'
  } 
};

paths.src = {
  bower: 'src/bower_components/',
  fonts: "src/fonts/", 
  iconfont: 'src/iconfont/',
  images: 'src/images/',
  misc: 'src/misc/',
  sass: 'src/sass/',
  scripts: 'src/scripts/',
  scriptsVendor: 'src/scripts/vendor/',
  sprites: 'src/sprites/',
  templates: 'src/templates/',
};

paths.dist = {
  css: paths.prefix.dist + 'css/',
  bower: paths.prefix.dist + 'bower/',
  fonts: paths.prefix.dist + "fonts/", 
  htdocs: 'htdocs/',
  iconfont: paths.prefix.dist + 'fonts/iconfont/',
  images: paths.prefix.dist + 'images/',
  misc: paths.prefix.dist + '',
  root: paths.prefix.dist + '',
  scripts: paths.prefix.dist + 'js/',
  scriptsVendor: paths.prefix.dist + 'js/vendor/',
  sprites: paths.prefix.dist + 'sprites/',
  templates: paths.prefix.dist + 'templates/',
};

/* ======== TASK DEFINITIONS ======== */
/**
 * Clean assets folder
 * this function is only called 
 * on the build task
 */
gulp.task('clean::assets', function (callback) {

  var fs = require('fs');

  // Check if file exists
  fs.exists(paths.dist.root, function(exists) {
      if (!exists) {
        callback();
      } else {
        del(paths.dist.root).then(function(){
          callback();
        });
      };
  });
});

gulp.task('bower', function(){
    const f = filter(['**/*.js', '!**/*.css'], {restore: true});
    var uglifyOptions = {
      compress: {
        drop_debugger: false
      }
    };

    return gulp.src('./bower.json')
        .pipe(mainBowerFiles())
        .pipe(f)
        .pipe(uglify())
        .pipe(f.restore)
        .pipe(gulp.dest(paths.dist.bower));
});

/**
 * sass task
 */
gulp.task('sass', function(){

  var sassOptions = {
    outputStyle: 'compressed'
  };

  var autoprefixerOptions = {
    cascade: false,
    browsers: ['> 5%', 'ie 9'],
  };

  var renameOptions = {
    suffix: '.min'
  };

  return gulp.src(paths.src.sass + "*.scss")
      .pipe( plumber({errorHandler: notify.onError("Error: <%= error.message %>")}) )
      .pipe( include() )
      .pipe( sass( sassOptions ) )
      .pipe( autoprefixer( autoprefixerOptions ) )
      .pipe( rename( renameOptions ) )
      .pipe( gulp.dest(paths.dist.css) )
      .pipe( livereload()) ;
})

// SCRIPTS
gulp.task("scripts::src", function() {

  var uglifyOptions = {
    compress: {
      drop_debugger: false
    }
  };

  var files = [
    paths.src.scripts + '**/*.js',
    '!' + paths.src.scripts + 'vendor/*.min.js',
    '!' + paths.src.scripts + 'common/*.js',
    '!' + paths.src.scripts + 'modules/*.js'
  ];

  return gulp.src( files )
    .pipe( plumber() )
    .pipe( include() )
    .pipe( uglify(uglifyOptions) )
    .pipe( rename({suffix: '.min'}) )
    .pipe( gulp.dest(paths.dist.scripts) );
});

/**
 * Copy all defined vendor scripts from the bower directory
 * and all scripts from src/scripts/vendor with a .min.js file extension
 */
gulp.task("scripts::vendor", function() {

  var files = [
    paths.src.scripts + 'vendor/*.min.js',
  ];

  return gulp.src( files )
    .pipe( gulp.dest(paths.dist.scriptsVendor) );
});

gulp.task("scripts", function(callback) {
  runSequence(
    ['scripts::src', 'scripts::vendor'],
    callback
  );
});

gulp.task("scripts::watch", function(callback) {
  runSequence(
    'scripts',
    'livereload',
    callback
  );
});


// Images
gulp.task('images', function()
  {
    return gulp.src( paths.src.images + '**/*.{gif,jpg,png,svg}')
      .pipe(plumber())
      .pipe(imagemin())
      .pipe(gulp.dest(paths.dist.images));
  }
);

gulp.task("images::watch", function(callback) {
  runSequence(
    'images',
    'livereload',
    callback
  );
});

// Iconfont
gulp.task('iconfont', function() {

  var fontName = 'iconfont';

  return gulp.src(paths.src.iconfont + '*.svg')
    .pipe(iconfontCss({
      fontName: fontName,
      path: paths.src.iconfont + '_icons.scss',
      targetPath: '../../../../' + paths.src.sass + 'common/_iconfont.scss',
      fontPath: '../fonts/iconfont/'
    }))
    .pipe(iconfont({
      fontName: fontName
    }))
    .pipe(gulp.dest(paths.dist.iconfont));
});

// Fonts
gulp.task('fonts', function() {
  return gulp.src( paths.src.fonts + '**/*')
    .pipe(gulp.dest(paths.dist.fonts));
});

// Misc
gulp.task('misc', function() {
  return gulp.src( paths.src.misc + '**/*')
    .pipe(gulp.dest(paths.dist.htdocs));
});

// Templates
gulp.task('templates', function() {
  return gulp.src( paths.src.templates + '**/*')
    .pipe(gulp.dest(paths.dist.templates));
});

gulp.task("templates::watch", function(callback) {
  runSequence(
    'templates',
    'livereload',
    callback
  );
});

// simple page reload
gulp.task("livereload", function(callback) {
  livereload.reload();
  callback();
});


/* ======== Execution ======== */
// Default
gulp.task('default', function(callback){
  runSequence(
    'build',
    'watch',
    callback
  );
});

// Build
gulp.task('build',  function(callback){
  runSequence(
    'clean::assets',
    [
      'bower',
      'fonts',
      'iconfont',
      'images',
      'misc',
      'scripts',
      'templates',
    ],
    'sass',
    callback
  );
});

// Watch
gulp.task('watch', function()
{
  livereload.listen();

  gulp.watch([ paths.src.iconfont + '*'], ['iconfont']);
  gulp.watch([ paths.src.images + '**/*'], ['images::watch']);
  gulp.watch([ paths.src.templates + '**/*'], ['templates::watch']);
  gulp.watch([ paths.src.sass + '**/*.scss'], ['sass']);
  gulp.watch([ paths.src.scripts + '**/*.js'], ['scripts::watch']);
});