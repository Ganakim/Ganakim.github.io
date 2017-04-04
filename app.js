var express = require('express');
var app = express();

app.use(express.static('Client'));

app.get('/imagesS', function(req, res) {
  
});
app.get('/imagesB', function(req, res) {
  
});
app.listen(process.env.PORT, process.env.IP, function() {
  console.log('Server is listening on port: ' + process.env.PORT);
});