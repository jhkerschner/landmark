module.exports = function(grunt) {
  var autoprefixer = require('autoprefixer');
  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sourceRoot: 'assets',

    // use this one for wordpress builds 
    buildRoot: '../build/wp-content/themes/landmark/assets',

    // and target css in the root of the theme
    cssDest: '../build/wp-content/themes/landmark',

    jshint: {
      options: {
        force: true
      },
      all: ['<%= sourceRoot %>/js/script.js']
    },
    uglify: {
      dev: {
        options: {
          beautify: false,
          mangle: false
        },
        files: {
          '<%= buildRoot %>/js/script.min.js': [
            '<%= sourceRoot %>/js/jquery.bxslider.js',
            '<%= sourceRoot %>/js/script.js'
          ],
          '<%= buildRoot %>/js/ie-polys.js': [
            '<%= sourceRoot %>/js/pointer-events-polyfill.js',
            '<%= sourceRoot %>/js/html5shiv.min.js',
            '<%= sourceRoot %>/js/respond.min.js',
          ],
          '<%= buildRoot %>/js/picturefill.min.js' : '<%= sourceRoot %>/js/picturefill-3.0.1.js',
          '<%= buildRoot %>/js/justice.mapped.min.js' : '<%= sourceRoot %>/js/justice.mapped.min.js'
        }
      },
      dist: {
        files: {
          '<%= buildRoot %>/js/script.min.js': [
            '<%= sourceRoot %>/js/jquery.bxslider.js',
            '<%= sourceRoot %>/js/script.js'
          ],
          '<%= buildRoot %>/js/ie-polys.js': [
            '<%= sourceRoot %>/js/pointer-events-polyfill.js',
            '<%= sourceRoot %>/js/html5shiv.min.js',
            '<%= sourceRoot %>/js/respond.min.js',
          ],
          '<%= buildRoot %>/js/picturefill.min.js' : '<%= sourceRoot %>/js/picturefill-3.0.1.js'
        }
      }
    },
    sass: {
      dist: {
        files: {
          '<%= cssDest %>/style.css' : '<%= sourceRoot %>/sass/style.scss',
          '<%= cssDest %>/assets/css/fancybox.min.css' : '<%= sourceRoot %>/sass/fancybox.scss'
        }
      }
    },
    postcss: {
      options: {
        map: false, // inline sourcemaps
        unused: false,
        zindex: false,
        idents: false,

        processors: [
          require('pixrem')(), // add fallbacks for rem units
          require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
          require('cssnano')() // minify the result
        ]
      },
      dist: {
        src: '<%= cssDest %>/*.css'
      }
    },
    svg2png: {
      all: {
        files: [
          {
            src: ['<%= buildRoot %>/svg/*.svg'],
            dest: '<%= buildRoot %>/svg/png'
          }
        ]
      }
    },
    watch : {
      scripts: {
        files: ['<%= sourceRoot %>/js/**/*.js'],
        tasks: ['jshint', 'uglify:dev', 'watch']
      },
      stylesheets: {
        files: ['<%= sourceRoot %>/sass/**/*.scss'],
        tasks: ['sass', 'postcss', 'watch']
      },
      svg2png: {
        files: ['<%= buildRoot %>/svg/*.svg'],
        tasks: ['newer:svg2png']
      }
    }
  });

  // Load the plugins.

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-newer');
  grunt.loadNpmTasks('grunt-svg2png');

  // Default task(s).
  grunt.registerTask('default', ['sass', 'postcss', 'jshint', 'uglify:dev', 'svg2png', 'watch']);// $ grunt
  grunt.registerTask('dist', ['sass', 'postcss', 'jshint', 'uglify:dist', 'svg2png']);// $ grunt dist
};