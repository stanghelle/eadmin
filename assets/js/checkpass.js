let pass1 = document.querySelector('#pass1');
let pass2 = document.querySelector('#pass2');
let result = document.querySelector('h1');

function checkpassword () {
  result.innerText = pass1.value == pass2.value ? 'Passordet er likt' :'Passordet er ikke likt';
  }

  pass1.addEventListener('keyup', () => {
    if (pass2.value.length != 0) checkpassword();
  })

  pass2.addEventListener('keyup', checkpassword);
