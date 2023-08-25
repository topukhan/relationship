let popBtn = document.getElementById("popBtn");
popBtn.addEventListener("click", pophandler);

function pophandler() {
    console.log("pop button clicked");

    const xhr = new XMLHttpRequest();

    xhr.open("GET", "https://jsonplaceholder.typicode.com/users");

    xhr.onload = function () {
        if (this.status == 200) {
            let obj = JSON.parse(this.responseText);
            console.log(obj);
            let count = 0;

            let list = document.getElementById("list");
            str = "";
            for (key in obj) {
                if (count < 5) {
                    str += `<li>${obj[key].name}</li>`;
                    count++;
                } else {
                    break;
                }
            }
            list.innerHTML = str;
        } else {
            alert("Error");
        }
    };

    xhr.send();
    console.log("we are done");
}

//show album
let album = document.getElementById("albumBtn");
album.addEventListener("click", showAlbum);

function showAlbum() {
    console.log("Album details will be shown shortly.");

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://jsonplaceholder.typicode.com/photos");

    xhr.onload = function () {
        if (this.status === 200) {
            let albums = JSON.parse(this.responseText);

            let container = document.querySelector(".details");
            container.innerHTML = ""; // Clear previous content

            albums.slice(0, 3).forEach((album, index) => {
                let albumDiv = document.createElement("div");
                albumDiv.className = "album-item";

                let albumId = document.createElement("p");
                albumId.innerHTML = `<strong>Album ID: </strong>${album.albumId}`;

                let id = document.createElement("p");
                id.innerHTML = `<strong>ID: </strong>${album.id}`;

                let title = document.createElement("p");
                title.innerHTML = `<strong>Title: </strong>${album.title}`;

                let url = document.createElement("p");
                url.innerHTML = `<strong>URL: </strong><a target="_blank" href="${album.url}">${album.url}</a>`;

                let thumbnailUrl = document.createElement("p");
                thumbnailUrl.innerHTML = `<strong>Thumbnail URL: </strong><img src="${album.thumbnailUrl}" alt="Thumbnail" />`;

                albumDiv.appendChild(albumId);
                albumDiv.appendChild(id);
                albumDiv.appendChild(title);
                albumDiv.appendChild(url);
                albumDiv.appendChild(thumbnailUrl);

                container.appendChild(albumDiv);
            });
        } else {
            alert(`Error ${xhr.status}`);
        }
    };

    xhr.send();
}

let localData = document.getElementById("localData");
console.log();

localData.addEventListener("click", localDataHandle);

function localDataHandle() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET', 'data.json');
    xhr.onload = function () {
        if (this.status === 200) {
            const data = JSON.parse(this.responseText);
            const tbody = document.getElementById("tbody");
            tbody.innerHTML = ''; 

            data.forEach(dataObj => {
                const name = dataObj.name;
                const email = dataObj.email;

                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${name}</td><td>${email}</td>`;
                tbody.appendChild(tr);
            });
        }
    };
    xhr.send();
}


