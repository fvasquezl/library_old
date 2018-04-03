if(window.location.hash === '#create')
{
    $('#myModal').modal('show');
}
$('#myModal').on('hide.bs.modal', function(){
    window.location.hash = '#';
});
$('#myModal').on('shown.bs.modal', function(){
    $('#name').focus();
    window.location.hash = '#create';
});