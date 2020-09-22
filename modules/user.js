$(function () {
	$('#nav-user').addClass('active')

	let site = app.site
	let base = app.base
	const userTable = $('#user-table')
	const tBody 	= $('#user-table tbody')

	loadData()

	$('#btn-add').click(function (event) {
		event.preventDefault()

		$('#user-modal-title').html('Tambah User')
		$('#id').val('')
		$('#no').val('')
		$('#nis').val('')
		$('#name').val('')
		$('#user-modal').modal('show')
	})

	$('#btn-save').click(function (event) {
		event.preventDefault()

		$('#user-modal').modal('hide')
		$('#user-modal-title').html('')

		let url = ($('#id').val() == '') ? "/user/insert" : "/user/update"
		let formData = $('#form-user').serialize()

		$.ajax({
			type: "POST",
			url: site + url,
			data: formData,
			success: function (response) {
				cancel()
				loadData()
				if ( response.errors == null ) {
					Swal.fire({
						title: "Sukses",
						text: response.success,
						icon: "success"
					})
				} else {
					Swal.fire({
						title: "Error",
						text: response.errors,
						icon: "error"
					})
				}
			}
		})
	})

	function loadData() {
		$.ajax({
			type: "GET",
			url: site + "/user/get"
		}).done(function (data) {
			let html = ``

			$.each(data, function (index, value) {
				html += `<tr data-id="${ value.id }">
							<td>${ value.no }</td>
							<td>${ value.nis }</td>
							<td>${ value.name }</td>
							<td>${ value.gender }</td>
							<td>${ value.password }</td>
						 </tr>`
			})

			tBody.html(html)

			userTable.DataTable()

			if ( data.length > 0 ) {
				tBody.on('click', 'tr', function (event) {
					let id = $(this).data('id')

					$('tr').removeClass('bg-selected')
					$(this).addClass('bg-selected')

					$('#action').removeClass('d-none')

					$('#btn-cancel').click(function (event) {
						event.preventDefault()

						cancel()
					})

					$('#btn-edit').click(function (event) {
						event.preventDefault()

						$.ajax({
							type: "GET",
							url: site + "/user/edit/" + id,
							success: function (response) {
								$('#user-modal-title').html('Edit User')
								$('#id').val(response.id)
								$('#no').val(response.no)
								$('#nis').val(response.nis)
								$('#name').val(response.name)
								$('#gender').html(`
									<option value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-Laki" ${ (response.gender == "Laki-Laki") ? "selected" : "" }>Laki-Laki</option>
									<option value="Perempuan" ${ (response.gender == "Perempuan") ? "selected" : "" }>Perempuan</option>
								`)
								$('#user_type').html(`
									<option value="">--Pilih Jenis Kelamin--</option>
									<option value="SISWA" ${ (response.user_type == "SISWA") ? "selected" : "" }>SISWA</option>
									<option value="GURU" ${ (response.user_type == "GURU") ? "selected" : "" }>GURU</option>
								`)
								$('#user-modal').modal('show')
							}
						})
					})

					$('#btn-delete').click(function (event) {
						event.preventDefault()

						Swal.fire({
		                    title: "Yakin..??",
		                    icon: "warning",
		                    text: "Data Akan Di Hapus!",
		                    showCancelButton: true,
		                    confirmButtonColor: '#3085d6',
		                    cancelButtonColor: '#d33',
		                    confirmButtonText: 'Hapus',
		                    cancelButtonText: 'Batal'
		                }).then((result) => {
		                    if ( result.value ) {
		                        $.ajax({
		                            type: "GET",
		                            url: site + "/user/delete/" + id,
		                            success: function (response) {
		                            	cancel()
		                            	loadData()
		                                Swal.fire({
		                                    title: "Sukses",
		                                    text: response,
		                                    icon: "success"
		                                })
		                            }
		                        })
		                    }
		                })
					})
				})
			}
		})
	}

	function cancel() {
		$('tr').removeClass('bg-selected')
		$('#action').addClass('d-none')
	}
})