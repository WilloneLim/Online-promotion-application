const promoterList = document.querySelector('.promoter');

const setupPromo = (data) => {

    if (data.length){
    let html = '';
    data.forEach(doc => {
        const user = doc.data();
        const card = `<tr>
			     <td><a href="PromoterActivity.php" id="mylink">${user.username}</a></td>
				 <td><a>${user.profileimg}</a></td>
				 <td id="mylink">To be added</td>
			         <td><a class="btn btn-success text-white w-100 disabled" id="mylink"> Edit </a></td>
				 <td><a href="javascript:delete_id" id="mylink" class="btn btn-danger text-white w-100 remove" id="del_click">Delete</a></td>
			  </tr>`;
        html += card;
    });

        promoList.innerHTML = html;

    }else{
        promoList.innerHTML = "<h5>Please log in to view promotions!</h5>";
    }
    
}