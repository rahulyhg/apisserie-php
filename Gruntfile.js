module.exports = function(grunt)
{

  var cssPath  = 'public/css/',
      scssPath = 'resources/assets/scss/';

  var scssFiles = {};

  scssFiles[cssPath + 'style.css'] = scssPath + 'style.scss';
  scssFiles[cssPath + 'print.css'] = scssPath + 'print.scss';

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
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('default', ['sass']);

}