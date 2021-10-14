const flashdata = $('.flash-data').data('flashdata');
console.log(flashdata);

if (flashdata == 'berhasil') {
	Swal.fire({
		title	: 'Login Berhasil!',
		text	: 'Anda berhasil login',
		icon	: 'success'
	});
}else if(flashdata == 'gagal'){
	Swal.fire({
		title	: 'Login Gagal!',
		text	: 'Username atau Password Anda Salah.',
		icon	: 'error'
	});
}else if(flashdata == 'tidak aktif'){
	Swal.fire({
		title	: 'Login Gagal!',
		text	: 'Maaf Akun Anda Sudah Tidak Aktif',
		icon	: 'error'
	});
}else if(flashdata == 'sudah login'){
	Swal.fire({
		title	: 'Proses Gagal',
		text	: 'Maaf Anda Sudah Login! Silahkan Logout Terlebih Dahulu',
		icon	: 'warning'
	});
}else if(flashdata == 'belum login'){
	Swal.fire({
		title	: 'Proses Gagal',
		text	: 'Maaf Anda Belum Login! Silahkan Login Terlebih Dahulu',
		icon	: 'error'
	});
}else if(flashdata == 'akses terlarang'){
	Swal.fire({
		title	: 'Proses Terlarang',
		text	: 'Anda itu siapa? Sadari Diri Anda Terlebih Dahulu',
		icon	: 'error'
	});
}else if(flashdata == 'Ditambah'){
	Swal.fire({
		title	: 'Berhasil',
		text	: 'Data Berhasil ' + flashdata,
		icon	: 'success'
	});
}else if(flashdata == 'Dihapus'){
	Swal.fire({
		title	: 'Berhasil',
		text	: 'Data Berhasil ' + flashdata,
		icon	: 'success'
	});
}else if(flashdata == 'Diubah'){
	Swal.fire({
		title	: 'Berhasil',
		text	: 'Data Berhasil ' + flashdata,
		icon	: 'success'
	});
}else if(flashdata == 'Ganda'){
	Swal.fire({
		title	: 'Gagal Tambah Data',
		text	: 'Username sudah digunakan!',
		icon	: 'warning'
	});
}else if(flashdata == 'NULL'){
	Swal.fire({
		title	: 'Tidak Ada Data',
		text	: 'Data Tidak Ditemukan',
		icon	: 'warning'
	});
}