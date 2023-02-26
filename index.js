// Code JavaScript pour afficher un message de succès après le téléchargement du fichier
const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const input = document.querySelector('input[type="file"]');
  const file = input.files[0];
  const xhr = new XMLHttpRequest();
  const formData = new FormData();
  formData.append('file', file);
  xhr.open('POST', 'upload.php');
  xhr.onload = () => {
    if(xhr.status === 200) {
      const response = xhr.responseText;
      input.value = ''; // Efface le nom du fichier dans l'input après le téléchargement
      alert(response);
    } else {
      alert('Une erreur s\'est produite lors du téléchargement.');
    }
  }
  xhr.send(formData);
});
