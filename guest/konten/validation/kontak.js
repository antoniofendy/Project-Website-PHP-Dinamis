$(function(){

	var $kontak =  $("#fm_kontak");

	if($kontak.length){

		$kontak.validate({

			rules:{
				//menggunakan variabel dari name attribut input, bukan dengan id
				nama:{
					required: true
				},
				email:{
					required: true,
					email: true
				},
				subjek:{
					required: true
				},
				pesan:{
					required: true,
					minlength: 100
				}
			},

			messages:{
				nama:{
					required: "  Nama wajib diisi!"
				},
				email:{
					required: "  Email wajib diisi!",
					email: "  Isi dengan format email yang benar!"
				},
				subjek:{
					required: "  Subjek wajib diisi!"
				},
				pesan:{
					required: "  Pesan wajib diisi!",
					minlength: "  Pesan minimal 100 karakter!"
				}
			}

		})
	}
})