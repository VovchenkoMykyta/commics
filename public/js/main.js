let options = {
    searchId: 'search-icon-container',
    searchContainer: 'search'
};

function init(){
    let searchBtn = document.getElementById(options.searchId);
    let searchContainer = document.getElementById(options.searchContainer);

    searchIconClick(searchBtn, searchContainer);
}

function searchIconClick(searchBtn, searchContainer){
    searchBtn.addEventListener('click', function(event) {
        if(searchContainer.style.display == 'block'){
            searchContainer.style.display = 'none'
        }else{
            searchContainer.style.display = 'block'; 
        }
    })
}

init();
