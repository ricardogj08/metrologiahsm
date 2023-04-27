// Get id of Input file
const fileInput = document.getElementById('dropzone-file')
// Get id of p
const fileNameDisplay = document.getElementById('file-name-display')

// Evente Change to get name file of input file and add to p of fileNameDisplay
fileInput.addEventListener('change', () => {
  const fileName = fileInput.files[0].name
  fileNameDisplay.innerText = fileName
})
