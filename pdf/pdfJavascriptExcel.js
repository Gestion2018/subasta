<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>
<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>


function exportPdf() {
    var pdf = new jsPDF('l', 'pt', 'letter');
    source = $('#data').get(0);

    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true;
        }
    };

    margins = {
        top: 40,
        bottom: 20,
        left: 10,
        width: "100%"
    };

    pdf.fromHTML(
            source,
            margins.left,
            margins.top, {
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },
            function (dispose) {
                pdf.save('Test.pdf');
            }, margins);
}

function exportExcel() {
    if ($("#form-professor").val() !== "-1") {
        $("#datatable").table2excel({
            exclude: ".noExl",
            filename: $("#form-professor option:selected").text().trim(),
            fileext: ".xls",
            name: "Profesor",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    }
}