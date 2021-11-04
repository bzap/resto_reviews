document.getElementById('custom-file-loc').onchange = function () { 
    document.getElementById('loc-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }
  
document.getElementById('custom-file-food').onchange = function () { 
    document.getElementById('food-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }