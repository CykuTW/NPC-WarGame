const express = require('express');
const mongo = require('mongodb');
const bodyParser = require('body-parser')


const config = {
    port: 9527,
    mongoHost: 'mongodb://localhost/wargame'
};

const app = express();
app.set('views', __dirname + '/views');
app.engine('html', require('ejs').renderFile);
app.set('view engine', 'html');
app.use(bodyParser.urlencoded({
    extended: true
})); 

app.post('/', function(req, res) {
    try {
        req.app.get('db').collection('users').findOne({
            username: req.body.username,
            password: req.body.password
        }, function(err, data) {
            if (data) {
                res.render('RANDOM_FOLDER_NAME/flag.html');
            } else {
                res.redirect('/');
            }
        });
    } catch (err) {
        console.log(err);
        res.redirect('/');
    }
})

app.get('/', function(req, res) {
    res.render('index.html');
});

const mc = mongo.MongoClient;
mc.connect(config.mongoHost, (err, database) => {
	if(!err){
		db = database;
		app.set('db', db);
		app.listen(process.env.PORT || config.port, () => {
			/* eslint-disable no-console */
			console.log(`Server started on ${process.env.PORT || config.port}`);
			/* eslint-enable no-console */
		});
	}else{
		/* eslint-disable no-console */
		console.error('Cannot connect to database.');
		/* eslint-enable no-console */
	}
});

process.on('SIGINT', () => {
	/* eslint-disable no-console */
	console.log('Mongodb disconnected on app termination');
	/* eslint-enable no-console */
	db.close();
	process.exit();
});