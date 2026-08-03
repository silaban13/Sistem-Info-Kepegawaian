const desktopInput = document.getElementById("searchInput");
const desktopResult = document.getElementById("searchResult");
const mobileInput = document.getElementById("searchInputMobile");
const mobileResult = document.getElementById("searchResultMobile");

function initSearch(input, resultBox){
    if(!input || !resultBox) return;
    input.addEventListener("keyup", function(){
        let keyword = this.value.trim();
        if(keyword.length < 2) {
            resultBox.innerHTML = "";
            resultBox.classList.add("hidden");
            return;
        }

        fetch("backend/api/index.php?route=search&q=" + encodeURIComponent(keyword))
        .then(response => response.json())
        .then(data=>{
            resultBox.innerHTML = "";
            if(data.length===0){
                resultBox.innerHTML = `<div class="p-4 text-gray-500"> Tidak ditemukan </div> `;
            } else {
                data.forEach(item=>{
                    resultBox.innerHTML += `
                        <a href="${item.url}" class="block p-4 hover:bg-gray-100">
                            <h3 class="font-semibold text-blue-600"> 📄 ${item.title} </h3>
                            <p class="text-sm text-gray-600"> ${item.snippet} </p>
                        </a>
                    `;
                });
            }

            resultBox.classList.remove("hidden");

        });
    });
}

initSearch(desktopInput, desktopResult);
initSearch(mobileInput, mobileResult);