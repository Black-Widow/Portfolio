# Require
+gulp = require('gulp')
$ = require('gulp-load-plugins')()
browserSync = require('browser-sync')
reload = browserSync.reload
path = global.path
browser_support = global.browser_support

# Tasks
gulp.task 'sass', ->
  gulp.src path.scss + "*.scss"
    .pipe $.sass
      onError: console.error.bind(console, 'Compilation Error:')
    .pipe $.autoprefixer(browsers: browser_support)
    .pipe gulp.dest path.css
    .pipe $.size()
    .pipe reload(stream: true)

gulp.task 'coffee', ->
  gulp.src path.js +"*.coffee"
    .pipe $.coffee(bare: true)
    .pipe gulp.dest path.js
    .pipe $.size()

gulp.task 'minify', ->
  gulp.src "app/*.php"
    .pipe $.useref()
    .pipe gulp.dest "appProd"
  gulp.src path.css + "*.css"
    .pipe $.minifyCss()
    .pipe gulp.dest "appProd/css"
    .pipe($.size());
  gulp.src path.js + "*.js"
    .pipe $.uglify()
    .pipe gulp.dest "appProd/js"
    .pipe($.size());
  gulp.src path.imgCss + "*"
    .pipe $.imagemin(optimizationLevel: 5, progressive: true, intrelace: true)
    .pipe gulp.dest "appProd/img/css"

gulp.task 'default', ->
  browserSync
    notify: false
    proxy: 'local.dev'
gulp.watch path.refresh, reload
gulp.watch path.scss + "**/*.scss", ["sass"]
gulp.watch path.js + "**/*.coffee", ["coffee"]