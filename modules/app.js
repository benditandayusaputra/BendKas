app = {}

const success = $('.success').data('success')
const warning = $('.warning').data('warning')
const error = $('.error').data('error')

if ( success ) {
	Swal.fire({
		title: "Sukses",
		text: success,
		icon: "success"
	})
}

if ( warning ) {
	Swal.fire({
		title: "Peringatan",
		text: warning,
		icon: "warning"
	})
}

if ( error ) {
	Swal.fire({
		title: "Error",
		text: error,
		icon: "error"
	})
}