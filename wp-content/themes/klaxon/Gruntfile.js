'use strict';
module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dev: {
				files: {
					'library/css/style.css': 'library/scss/style.scss',
					'library/css/ie.css': 'library/scss/ie.scss'
				},
				options: {
					sourceMap: true,
					outputStyle: 'expanded'
				}
			},
			release: {
				files: {
					'library/css/style.min.css': 'library/scss/style.scss',
					'library/css/ie.min.css': 'library/scss/ie.scss'
				},
				options: {
					sourceMap: false,
					outputStyle: 'compressed'
				}
			},
		},		
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass'],
				options: {
		      livereload: 35729
		    }
			}
		},
		concat: {
      options: {
         separator: ';\n'
      },
	    release: {
        src: [
	       'library/js/scripts.js'
        ],
        dest: 'library/js/scripts.min.js',
	    }
		},
		uglify: {
	    release: {
	        src: 'library/js/scripts.min.js',
	        dest: 'library/js/scripts.min.js'
	    }
		},
	  jshint: {
			dev: {
	      src: ['library/js/scripts.js'],
	      options: {
	        globals: {
	          jQuery: true,
	          console: true,
	          module: true,
	          document: true
	        }
	      }
	    },
	    release: {
	      src: ['library/js/scripts.min.js'],
	      options: {
	        globals: {
	          jQuery: true,
	          console: true,
	          module: true,
	          document: true
	        }
	      }
	    }
   }
	});
	// Load the Grunt plugins.
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	
	// Register the default tasks.
	grunt.registerTask('develop', [
	
		'sass:dev',
		'jshint:dev',
		'watch'
		
	]);
	
	grunt.registerTask('production', [
		
		'sass:release',
		'concat:release',
 		'jshint:release',
		'uglify:release'
		
	]);

};
