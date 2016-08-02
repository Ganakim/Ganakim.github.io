var express = require('express');
var dropbox = require('dropbox');

var app = express();

app.use(express.static('Client'));

app.get('/imagesS', function(req, res) {
var dbx = new dropbox({ accessToken: 'kg_gKGD2HoUAAAAAAAAB-RDYetv_dfoZUykrwLAh_Y8ARzWUq7LH4usEUW8WxLf8' });
dbx.filesListFolder({path: '/Sketches'})
  .then(function(response) {
    var entries = response.entries;
    
    var sharedLinks = [];
    var promises = [];
    for(var i = 0; i < entries.length; i++) {
      var currentPath = entries[i].path_lower;
      promises.push(dbx.sharingCreateSharedLinkWithSettings({
        path: currentPath
      }).then(function(resp) {
        var url = resp.url;
        
        url = url.replace("www.dropbox", "dl.dropboxusercontent");
        
        sharedLinks.push(url);
      }));
    }
    Promise.all(promises).then(function() {
      //console.log(sharedLinks.length);
      res.send(sharedLinks);
    });
    //res.send(sharedLinks);
  })
  .catch(function(error) {
    console.log(error);
    res.send('error');
  });
  
});
app.get('/imagesB', function(req, res) {
var dbx = new dropbox({ accessToken: 'kg_gKGD2HoUAAAAAAAAB-RDYetv_dfoZUykrwLAh_Y8ARzWUq7LH4usEUW8WxLf8' });
dbx.filesListFolder({path: '/Blender'})
  .then(function(response) {
    var entries = response.entries;
    
    var sharedLinks = [];
    var promises = [];
    for(var i = 0; i < entries.length; i++) {
      var currentPath = entries[i].path_lower;
      promises.push(dbx.sharingCreateSharedLinkWithSettings({
        path: currentPath
      }).then(function(resp) {
        var url = resp.url;
        
        url = url.replace("www.dropbox", "dl.dropboxusercontent");
        
        sharedLinks.push(url);
      }));
    }
    Promise.all(promises).then(function() {
      //console.log(sharedLinks.length);
      res.send(sharedLinks);
    });
    //res.send(sharedLinks);
  })
  .catch(function(error) {
    console.log(error);
    res.send('error');
  });
  
});
app.listen(process.env.PORT, process.env.IP, function() {
  console.log('Server is listening on port: ' + process.env.PORT);
});