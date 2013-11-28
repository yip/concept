module.exports = function(grunt) {

	'use strict';

	grunt.loadNpmTasks('grunt-php');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.initConfig({
		php: {
			dist: {
				options: {
					keepalive: true,
					open: true,
					port: 8086
				}
			}
		}
	});

	grunt.registerTask('default', ['php']);
};