document.getElementById("file").onchange = function () {
    let name = this.value;
    name = name.replace("C:\\fakepath\\", '');
    document.getElementById("uploadFile").value = name;
    document.getElementById('botup').style.display = 'inline';
};