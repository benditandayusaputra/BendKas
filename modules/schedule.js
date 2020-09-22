$(function () {
	$('#nav-schedule').addClass('active')

	let day = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"]
	let site = app.site
	let base = app.base
	const scheduleTable = $('#schedule-table')
	const tBody 	= $('#schedule-table tbody')

	loadData()

	$('#btn-add').click(function (event) {
		event.preventDefault()

		let days = `<option value="">--Pilih Hari--</option>`
		$('#schedule-modal-title').html('Tambah Jadwal')
		$('#id').val('')
		$('#amount').val('')
		$.each(day, function (index, value) {
			days += `<option value="${ index + 1 }">${ value }</option>`
		})

		$('#day').html(days)
		$('#schedule-modal').modal('show')
	})

	$('#btn-save').click(function (event) {
		event.preventDefault()

		$('#schedule-modal').modal('hide')
		$('#schedule-modal-title').html('')

		let url = ($('#id').val() == '') ? "/schedule/insert" : "/schedule/update"
		let formData = $('#form-schedule').serialize()

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
						icon: "success"
					})
				}
			}
		})
	})

	function loadData() {
		$.ajax({
			type: "GET",
			url: site + "/schedule/get"
		}).done(function (data) {
			let html = ``
			let days = `<option value="">--Pilih Hari--</option>`

			$.each(data, function (index, value) {
				html += `<tr data-id="${ value.id }">
							<td>${ index + 1 }</td>
							<td>${ day[value.day - 1] }</td>
							<td>Rp. ${ value.amount },00</td>
						 </tr>`
			})

			tBody.html(html)

			$.each(day, function (index, value) {
				days += `<option value="${ index + 1 }">${ value }</option>`
			})

			$('#day').html(days)

			scheduleTable.DataTable()

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
							url: site + "/schedule/edit/" + id,
							success: function (response) {
								let days = `<option value="">--Pilih Hari--</option>`
								$('#schedule-modal-title').html('Edit Jadwal')
								$('#id').val(response.id)
								$('#amount').val(response.amount)
								
								$.each(day, function (index, value) {
									days += `<option value="${ index + 1 }" ${ (index + 1 == response.day) ? "selected" : "" }>${ value }</option>`
								})

								$('#day').html(days)
								$('#schedule-modal').modal('show')
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
		                            url: site + "/schedule/delete/" + id,
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