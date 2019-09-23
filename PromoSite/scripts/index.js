const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');


//logout user
const logout = document.querySelector('#logout');
logout.addEventListener('click', (e) => {
    e.preventDefault();
    auth.signOut();
    
});

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
    }else{
        //hide profile
        adminItems.forEach(item => item.style.display = 'none');
//        accountDetails.innerHTML = '';
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
    }
}

//setup promos
const setupPromo = (data) => {

    if (data.length){
    let html = '';
    data.forEach(doc => {
        const promo = doc.data();
        const card = `<div class="col-md-12 pb-5 grid-item ${promo.author}">
         <div class="col-md-8 shadow-lg mx-auto p-2">
         <a href="share.php?id=${promo.id}">
         <img class="img-fluid p-2 mt-2" src="images/defaultpromotionimg.png" alt="IMG-PRODUCT">
         </a>
         <h5 class="pt-2 pl-3">${promo.title}</h5>

         <a href="promoterview.php?id=${promo.id}" class="text-muted pl 3">${promo.author}</a>'

         <input class="float-right pb-3 pr-2" type="image" src="images/wishlist_false.png" />
        <br/>
        <br/>
        </div>
        </div> `;
        
        
        html += card;
    });

        promoList.innerHTML = html;

    }else{
        promoList.innerHTML = "<h5>Please log in to view promotions!</h5>";
    }
    
}