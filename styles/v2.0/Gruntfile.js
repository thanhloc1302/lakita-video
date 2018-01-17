module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        sass: {// Task 
            dist: {// Target 
                options: {// Target options 
                    style: 'expanded'
                },
                files: {// Dictionary of files 
                    'css/navbar_fix.css': 'sass/navbar_fix.scss' // 'destination': 'source' 
                }
            }
        },

        obfuscator: {
            options: {
                // global options for the obfuscator 
            },
            task1: {
                options: {
                    // options for each sub task 
                },
                files: {
                    'js/output.js': [
                        'js/file1.js'
                    ]
                }
            }
        }

        ,
        watch: {
            css: {
                files: ['sass/*.scss'],
                tasks: ['sass']
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-obfuscator');

    grunt.registerTask('default', ['sass', 'watch']);


};