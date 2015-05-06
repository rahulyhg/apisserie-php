module.exports = function(grunt)
{

  var path =
  {
    css  : 'public/css/',
    scss : 'resources/assets/scss/',
    js   :
    {
      Src : 'resources/assets/scss/',
      min : 'public/css/'
    }
  }


  grunt.initConfig(
  {

    sass :
    {
      dist :
      {
        options :
        {
          style: 'compressed'
        },

        files :
        {
          'public/css/style.css' : 'resources/assets/scss/style.scss',
          'public/css/print.css' : 'resources/assets/scss/print.scss'
        }
      }
    },

    uglify :
    {
      my_target :
      {
        files :
        {
          'public/js/scripts.min.js' : [ 'resources/assets/js/scripts.js' ],
          'public/js/print.min.js'   : [ 'resources/assets/js/print.js' ]
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  //grunt.loadNpmTasks('grunt-autoprefixer');

  grunt.registerTask( 'default', [ 'sass', 'uglify' ] );

}