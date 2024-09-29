const fileInputs = document.querySelectorAll('.file-control');

//document content loaded listener
document.addEventListener('DOMContentLoaded', function () {
  console.log("File found in DOM : ", fileInputs.length);
  fileInputs.forEach(function (fileInput) {
    //append a file container for preview before upload
    const fileContainer = document.createElement('div');
    fileContainer.id = 'fileContainer';
    // padding 4xp
    fileContainer.style.padding = '4px';

    fileInput.parentNode.appendChild(fileContainer, fileInput);
    //add button
    const buttonDiv = document.createElement('button');
    //type
    buttonDiv.type = 'button';
    buttonDiv.innerHTML = '<i class="fas fa-trash-alt"></i>';
    // float right
    buttonDiv.style.float = 'right';
    //style as buttons
    buttonDiv.style.border = 'none';
    buttonDiv.style.backgroundColor = 'transparent';
    buttonDiv.style.color = 'red';
    buttonDiv.style.cursor = 'pointer';
    //padding
    buttonDiv.style.padding = '4px';
    //hide button
    buttonDiv.style.display = 'none';
    fileInput.parentNode.insertBefore(buttonDiv, fileInput);


    // Add event listener to the file input
    fileInput.addEventListener('change', function (event) {


      //clear file container
      fileContainer.innerHTML = '';


      const imgWidth = 96;
      const imgHeight = 96;
      const files = event.target.files;
      if (files) {
        for (let i = 0; i < files.length; i++) {
          const filePriview = document.createElement('div');
          // flex display
          filePriview.style.display = 'flex';
          //align items center
          filePriview.style.alignItems = 'center';
          // border
          filePriview.style.border = '1px solid #ccc';
          // padding
          filePriview.style.padding = '8px';
          // margin
          filePriview.style.margin = '4px';
          //border
          filePriview.style.borderRadius = '4px';
          const previewContainer = document.createElement('div');
          const fileDetails = document.createElement('div');
          fileDetails.style.padding = '8px';
          filePriview.appendChild(previewContainer);
          filePriview.appendChild(fileDetails);
          fileContainer.appendChild(filePriview);
          const file = files[i];
          const reader = new FileReader();

          reader.onload = function (e) {
            const fileType = file.type.split('/')[0];
            if (fileType === 'image') {
              const img = new Image();
              img.src = e.target.result;
              img.id = 'preview';
              img.width = imgWidth;
              img.height = imgHeight;
              previewContainer.appendChild(img);
            } else {
              const iconClass = getFileIconClass(file.name);
              const icon = document.createElement('i');
              icon.classList.add('fas', iconClass);
              icon.style.fontSize = '48px';
              previewContainer.appendChild(icon);
            }
          }

          reader.readAsDataURL(file);

          // Display file details
          // fileDetails.innerHTML = `
          // <div>Name: ${file.name}</div>
          // <div>Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB</div>
          // <button style="margin-top: 8px;" id="removeFile">Remove <i class="fas fa-trash-alt"></i></button>

          //create divs for name and size with button 
          const nameDiv = document.createElement('div');
          nameDiv.innerHTML = `Name: ${file.name}`;
          const sizeDiv = document.createElement('div');
          sizeDiv.innerHTML = `Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB`;

          fileDetails.appendChild(nameDiv);
          fileDetails.appendChild(sizeDiv);
          //show button
          buttonDiv.style.display = 'block';
        }
      }
    });


    // Add event listener to the remove button
    buttonDiv.addEventListener('click', function () {
      //remove file from input
      fileInput.value = '';
      //remove file preview
      fileContainer.innerHTML = '';
      //hide button
      buttonDiv.style.display = 'none';
    });

  });

});

function getFileIconClass(fileName) {
  const fileExtension = fileName.split('.').pop().toLowerCase();
  switch (fileExtension) {
    case 'pdf':
      return 'fa-file-pdf';
    case 'doc':
    case 'docx':
      return 'fa-file-word';
    case 'xls':
    case 'xlsx':
      return 'fa-file-excel';
    case 'ppt':
    case 'pptx':
      return 'fa-file-powerpoint';
    default:
      return 'fa-file';
  }
}