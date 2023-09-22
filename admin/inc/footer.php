<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>
<script src="vendor/tinymce/tinymce.min.js"></script>
<script>
function setActive() {
    let navbar = document.getElementById('dashboard-menu');
    let a_tag = navbar.getElementsByTagName('a');
    const collapse = navbar.querySelectorAll('.collapse');
    const childAnchors = navbar.querySelectorAll('.nav-link');

    for (i = 0; i < a_tag.length; i++) {
        let file = a_tag[i].href.split('/').pop();
        let file_name = file.split('.')[0];

        if (document.location.href.indexOf(file_name) >= 0) {
            a_tag[i].classList.add('active');
        }
        
    }
    childAnchors.forEach((element) => {
        if(element.classList.contains("active")){
            const parentElement = element.closest('.dropdown-show');
            parentElement.classList.add('show');
        }
    })
}

// ! jquery
$(document).ready(function() {
    // ! Tinymce
    tinymce.init({
        selector: 'textarea',
        toolbar: 'numlist bullist',
        lists_indent_on_tab: false,
        height: 300,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    });
});

setActive();

</script>