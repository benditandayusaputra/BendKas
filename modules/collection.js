$(function () {
	$('#nav-collection').addClass('active')

	let site = app.site
	let base = app.base

	const collectionTable = $('#collection-table')
	const tBody 	= $('#collection-table tbody')

	loadData()

	$('#btn-start').click(function (event) {
		event.preventDefault()

		Swal.fire({
		    title: "Yakin..??",
		    icon: "question",
		    text: "Mulai Penarikan Kas",
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Mulai',
		    cancelButtonText: 'Batal'
		}).then((result) => {
		    if ( result.value ) {
		        window.location.href = site + "/collection/start/"
		    }
		})
	})

	function loadData() {
		$.ajax({
			type: "GET",
			url: site + "/collection/get"
		}).done(function (data) {
			let html = ``

			$.each(data, function (index, value) {
				html += `<tr>
							<td width="5%">${ index + 1 }</td>
							<td>${ value.date }</td>
							<td>${ value.user_kas }</td>
							<td>${ value.user_not_kas }</td>
							<td>Rp. ${ value.amount },00</td>
							<td>
								<a href="${ site + '/collection/detail/' + value.id }" class="btn btn-info">
									<i class="fa fa-list"></i> Detail
								</a>
							</td>
						 </tr>`
			})

			tBody.html(html)

			collectionTable.DataTable()
		})
	}
})