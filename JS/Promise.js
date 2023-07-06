const promise = new Promise(function(resolve, reject){
  setTimeout(()=>{
    console.log('taks completed');
    resolve();
  }, 2000)
});



