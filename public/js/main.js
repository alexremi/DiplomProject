alert( 'PRIVET' );

(function() {
setTimeout(function() {
  fetch('/api')
  .then(function(response){
    return response.json();
  })
  .then(function(data){
     document.getElementById('content').textContent = data.content;
})
  .catch(function(e){
     alert(e);
       });  
    },5000);
})();