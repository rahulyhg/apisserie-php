module.exports = function(grunt)
{

  var cssPath  = 'public/css/',
      scssPath = 'resources/assets/scss/';

  var scssFiles = {};

  scssFiles[cssPath + 'style.css'] = scssPath + 'style.scss';
  scssFiles[cssPath + 'print.css'] = scssPath + 'print.scss';
  scssFiles[cssPath + 'login.css'] = scssPath + 'login.scss';

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
        files : scssFiles
      }
    },

    autoprefixer :
    {
      options :
      {
        browsers : [ 'last 1 version', '> 5%' ],
        remove   : false
      },

      single_file :
      {
        src : 'public/css/style.css',
        src : 'public/css/login.css'
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  //grunt.loadNpmTasks('grunt-autoprefixer');

  grunt.registerTask( 'default', [ 'sass' ] );

}