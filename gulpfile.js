const { series, src, dest } = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const prefix = require('gulp-autoprefixer');

function js() {
  return src('scripts/*.js')
  .pipe(concat('code.js'))
  .pipe(dest('dist/js'));
}

function styles() {
  return src('content/*.css')
    .pipe(concat('site.css'))
    .pipe(cleanCSS({ compatibility: '*' }))
    .pipe(prefix('last 2 versions'))
    .pipe(dest('dist/css'));
}

exports.default = series(js, styles);
