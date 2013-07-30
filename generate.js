

var exec = require('child_process').exec;
var gr = exec('cd ./generator/ && grunt');

gr.stdout.once('data', function(data) {

	var httrack = exec([
		'rm -rf static',
		'mkdir ./static',
		'cd ./static',
		'httrack --continue --clean --max-rate=250000 http://localhost:8085'
	].join('&&'));

	httrack.on('exit', function() {
		httrack.kill();

		exec([
			// Get actual mirrored site and save in ./static/
			'mv ./static/localhost_8085 ./static_temp',
			'rm -rf ./static',
			'mv ./static_temp ./static'
		].join('&&')).once('exit', function() {
			console.log('Built ./static successfully :)');
			gr.kill();
			process.exit();
		});
	});
});