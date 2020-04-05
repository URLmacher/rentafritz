const { series, src, dest } = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const prefix = require('gulp-autoprefixer');

function js() {
  return src('scripts/*.js').pipe(concat('code.js')).pipe(dest('dist'));
}

function styles() {
  return src(['content/materialize.min.css', 'content/utility.css', 'content/*.css'])
    .pipe(concat('site.css'))
    .pipe(cleanCSS({ compatibility: '*' }))
    .pipe(prefix('last 2 versions'))
    .pipe(dest('dist'));
}

exports.default = series(js, styles);
