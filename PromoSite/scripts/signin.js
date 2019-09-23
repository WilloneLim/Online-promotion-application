//const loggedBoth = document.querySelectorAll('.loggedBoth');

    const setupUI = (user) => {
//    loggedBoth.forEach(item => item.style.display = 'block');
    if (user.admin){
        window.location.replace("adminconsole.html");
        
    }else if(user.promoter) {
        //hide profile
        window.location.replace("promoter.html");
    }else{
        window.location.replace("index.html");
    }
}
    
    



