$(document).ready(function () {
    /*$('.js-basic-example').DataTable({
        responsive: true
    });*/

    //Exportable table
    $('#listUnitBesaran').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});