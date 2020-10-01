$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var nama = button.data('nama')
    var email = button.data('email')
    var modal = $(this)

    modal.find('#namaEdit').val(nama)
    modal.find('#emailEdit').val(email)
    modal.find('#idEdit').val(id)
})

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#editPedagangModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var nama = button.data('nama')
    var email = button.data('email')
    var rating = button.data('rating')
    var statusVerifikasi = button.data('statusverifikasi')
    var statusDagang = button.data('statusdagang')
    var longitude = button.data('longitude')
    var latitude = button.data('latitude')
    var noKTP = button.data('noktp')
    var noTelp = button.data('notelp')
    var modal = $(this)

    modal.find('#idEdit').val(id)
    modal.find('#namaEdit').val(nama)
    modal.find('#emailEdit').val(email)
    modal.find('#ratingEdit').val(rating)
    modal.find('#statusVerifikasiEdit').val(statusVerifikasi)
    modal.find('#statusDagangEdit').val(statusDagang)
    modal.find('#longitudeEdit').val(longitude)
    modal.find('#latitudeEdit').val(latitude)
    modal.find('#noKTPEdit').val(noKTP)
    modal.find('#noTelpEdit').val(noTelp)
    modal.find('#id').val(id)
})

$('#deletePedagangModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})

$('#editPembeliModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var nama = button.data('nama')
    var email = button.data('email')
    var statusVerifikasi = button.data('statusverifikasi')
    var longitude = button.data('longitude')
    var latitude = button.data('latitude')
    var noTelp = button.data('notelp')
    var modal = $(this)

    modal.find('#idEdit').val(id)
    modal.find('#namaEdit').val(nama)
    modal.find('#emailEdit').val(email)
    modal.find('#statusVerifikasiEdit').val(statusVerifikasi)
    modal.find('#longitudeEdit').val(longitude)
    modal.find('#latitudeEdit').val(latitude)
    modal.find('#noTelpEdit').val(noTelp)
    modal.find('#id').val(id)
})

$('#deletePembeliModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('#idDelete').val(id)
})