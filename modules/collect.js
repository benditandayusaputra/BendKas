$(function () {
	$('#nav-collection').addClass('active')

	let site = app.site
	let base = app.base

	const collectionTable = $('#collect-table')
	const tBody 	= $('#collect-table tbody')

	loadData()

	$('#btn-finish').click(function (event) {
		window.location.href = site + "/collection/finish"
	})

	function loadData() {
		$.ajax({
			type: "GET",
			url: site + "/collection/getCollect"
		}).done(function (data) {
			let html = ``
			let button = `<button class="btn btn-success">
							<i class="fa fa-check"></i> Sudah
						  </button>`

			$.each(data, function (index, value) {
				html += `<tr data-id="${ value.id }">
							<td width="5%">${ index + 1 }</td>
							<td>${ value.date }</td>
							<td>${ value.name }</td>
							<td>${ (value.status_kas == "Belum") ? button : "Sudah Kas" }</td>
						 </tr>`
			})

			tBody.html(html)

			tBody.on('click', 'tr', function (event) {
				event.preventDefault()

				let id = $(this).data('id')

				Swal.fire({
				    title: "Yakin..??",
				    icon: "question",
				    text: "Yakin Sudah Kas",
				    showCancelButton: true,
				    confirmButtonColor: '#3085d6',
				    cancelButtonColor: '#d33',
				    confirmButtonText: 'Yakin',
				    cancelButtonText: 'Tidak'
				}).then((result) => {
				    if ( result.value ) {
				        $.ajax({
				            type: "GET",
				            url: site + "/collection/update/" + id,
				            success: function (response) {
				            	loadData()
				                Swal.fire({
				                    title: "Sukses",
				                    text: response.success,
				                    icon: "success"
				                })
				            }
				        })
				    }
				})
			})

			collectionTable.DataTable()
		})
	}
})