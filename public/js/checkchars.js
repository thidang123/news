
var input = document.getElementById('inputUsername');
input.oninvalid = function(event) {
        event.target.setCustomValidity('Tên usename không được chứa các ký tự đặc biệt và chỉ dài 1-12 ký tự');
    }
