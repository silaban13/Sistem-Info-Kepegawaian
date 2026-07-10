const searchInput = document.getElementById("searchInput");
const searchResult = document.getElementById("searchResult");


if(searchInput){

searchInput.addEventListener("keyup", function(){

    let keyword = this.value.trim();


    if(keyword.length < 2){

        searchResult.innerHTML="";
        searchResult.classList.add("hidden");

        return;
    }



    fetch(
        "backend/api/index.php?route=search&q="
        + encodeURIComponent(keyword)
    )

    .then(response => response.json())

    .then(data => {


        searchResult.innerHTML="";


        if(data.length === 0){

            searchResult.innerHTML =
            `
            <div class="p-4 text-gray-500">
                Tidak ditemukan
            </div>
            `;

        }
        else{


            data.forEach(item=>{


                searchResult.innerHTML +=
                `
                <a href="${item.url}"
                class="block p-4 hover:bg-gray-100">

                    <h3 class="font-semibold text-blue-600">
                        📄 ${item.title}
                    </h3>

                    <p class="text-sm text-gray-600">
                        ${item.snippet}
                    </p>

                </a>
                `;


            });


        }


        searchResult.classList.remove("hidden");


    });


});

}