function comfirmDelete(formClass){
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "Bạn sẽ không thể khôi phục được dữ liệu sau khi xóa!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.value) {
            $(formClass).submit();
        }
    })
}

function formatNumber(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    } 
    return x1 + x2;
}

function goToByScroll(ele) {
    // Scroll
    $('html,body').animate({
        scrollTop: $(ele).offset().top - 100
    }, 'slow');
}

$("#avatar").change(function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.avatar_preview img').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});
