function showOrHideLoginPassword() {
    const ele = document.getElementById('password');
    if(ele.type === 'password') {
        ele.type = 'text';
    }
    else {
        ele.type = 'password';
    }
}

function showOrHideRegisterPassword() {
    const e = document.getElementById('password');
    const e_confirm = document.getElementById('password_confirmation');
    if(e.type === 'password' && e_confirm.type === 'password') {
        e.type = 'text';
        e_confirm.type = 'text';
    }
    else {
        e.type = 'password';
        e_confirm.type = 'password';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('showPassword').checked = false;
})
