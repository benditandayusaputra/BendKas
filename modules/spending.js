$(function () {
	$('#nav-spending').addClass('active')

	let site = app.site
	let base = app.base
	const spendingTable = $('#spending-table')
	const tBody 	= $('#spending-table tbody')

	loadData()

	$('#btn-add').click(function (event) {
		event.preventDefault()

		$('#spending-modal-title').html('Tambah Pengeluaran')
		$('#id').val('')
		$('#amount').val('')
		$('#explanation').val('')
		$('#spending-modal').modal('show')
	})

	$('#btn-save').click(function (event) {
		event.preventDefault()

		$('#spending-modal').modal('hide')
		$('#spending-modal-title').html('')

		let url = ($('#id').val() == '') ? "/spending/insert" : "/spending/update"
		let formData = $('#form-spending').serialize()

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
			url: site + "/spending/get"
		}).done(function (data) {
			let html = ``

			$.each(data, function (index, value) {
				html += `<tr data-id="${ value.id }">
							<td>${ index + 1 }</td>
							<td>Rp. ${ value.amount },00</td>
							<td>${ value.date }</td>
							<td>${ value.explanation }</td>
						 </tr>`
			})

			tBody.html(html)

			spendingTable.DataTable()

			if ( data.user_type == null ) {
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
								url: site + "/spending/edit/" + id,
								success: function (response) {
									$('#spending-modal-title').html('Edit Pengeluaran')
									$('#id').val(response.id)
									$('#amount').val(response.amount)
									$('#explanation').val(response.explanation)
									$('#spending-modal').modal('show')
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
			                            url: site + "/spending/delete/" + id,
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
			}
		})
	}

	function cancel() {
		$('tr').removeClass('bg-selected')
		$('#action').addClass('d-none')
	}
})