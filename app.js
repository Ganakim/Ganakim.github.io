var express = require('express');
var dropbox = require('dropbox');

var app = express();

app.use(express.static('Client'));

app.get('/images', function(req, res) {
  
  var dbx = new dropbox({ accessToken: 'kg_gKGD2HoUAAAAAAAAB-RDYetv_dfoZUykrwLAh_Y8ARzWUq7LH4usEUW8WxLf8' });
  dbx.filesListFolder({path: '/ForSite'})
    .then(function(response) {
      console.log(response);
      res.send(response);
    })
    .catch(function(error) {
      console.log(error);
      res.send('error');
    });
});

app.listen(process.env.PORT, process.env.IP, function() {
  console.log('Server is listening on port: ' + process.env.PORT);
});