//add admin cloud function
const adminForm = document.querySelector('.admin-form');
adminForm.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log("here");
    const adminEmail = document.querySelector('#admin-add').value;
    const addAdminRole = functions.httpsCallable('addAdminRole');
    addAdminRole({ email: adminEmail}).then(result => {
        window.alert(result.data);
        adminForm.reset();
    })
})