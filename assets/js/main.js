$(function() {
  let currentLink = $('a[href="'+location.href+'"]').parents('li')
  currentLink.addClass('active')
	$('.select2').select2()
});


$(function () {
  $('#example1').DataTable();
});

if (document.querySelector('#harga')) {
	new rupiahFormat('#harga').getValue();
}

$('.box-table').css('overflow-x', 'auto');

$('#logo').on('change', previewImage);
$('#foto_orang').on('change', function() {
	let oFReader = new FileReader()
			oFReader.readAsDataURL(document.getElementById('foto_orang').files[0]);

	oFReader.onload = oFREvent => {
		$('#button-logo').css('background', '#ffffff');
		$('#button-logo i').hide();
		$('#orang-preview').show();
		$('#orang-preview').attr('src', oFREvent.target.result);
	}
});
$('#foto_kk').on('change', function() {
	let oFReader = new FileReader()
			oFReader.readAsDataURL(document.getElementById('foto_kk').files[0]);

	oFReader.onload = oFREvent => {
		$('#button-logo').css('background', '#ffffff');
		$('#button-logo i').hide();
		$('#kk-preview').show();
		$('#kk-preview').attr('src', oFREvent.target.result);
	}
});
$('#foto_lahan').on('change', function() {
	let oFReader = new FileReader()
			oFReader.readAsDataURL(document.getElementById('foto_lahan').files[0]);

	oFReader.onload = oFREvent => {
		$('#button-logo').css('background', '#ffffff');
		$('#button-logo i').hide();
		$('#lahan-preview').show();
		$('#lahan-preview').attr('src', oFREvent.target.result);
	}
});

function previewImage() {
	let oFReader = new FileReader()
			oFReader.readAsDataURL(document.getElementById('logo').files[0]);

	oFReader.onload = oFREvent => {
		$('#button-logo').css('background', '#ffffff');
		$('#button-logo i').hide();
		$('#image-preview').show();
		$('#image-preview').attr('src', oFREvent.target.result);
	}
}

$(document).ready(function() {
	getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi`)
		.then(function(data) {
			const province = data.semuaprovinsi;
			province.forEach(function(item) {
				$('#province').append(`<option data-id=${item.id}>${item.nama}</option>`);
			});
		});
});

$('#province').on('click', function() {
	getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi`)
		.then(function(data) {
			const province = data.semuaprovinsi;
			province.forEach(function(item) {
				$('#province').append(`<option data-id=${item.id}>${item.nama}</option>`);
			});
		});
});

	$('#province').on('change', function(e) {
		$('#city').html('');
		var val = $('#province > option:selected').data('id');

		getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/${val}/kabupaten`)
			.then(function(data) {
				const city = data.kabupatens;
				city.forEach(function(item) {
					$('#city').data('id', $('#province > option:selected').text());
					$('#city').append(`<option data-id=${item.id}>${item.nama}</option>`);

				});
			}).then(function() {
				var val = $('#city > option:selected').data('id');
					$('#kec').html('');
					getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/${val}/kecamatan`)
						.then(function(data) {
							const kec = data.kecamatans;
							kec.forEach(function(item) {
								$('#kec').append(`<option data-id=${item.id}>${item.nama}</option>`);
							});
						}).then(function() {							
							$('#vilage').html('');
							var idKec = $('#kec > option:selected').data('id');
							getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/${idKec}/desa`)
								.then(function(data) {
									const kec = data.desas;
									kec.forEach(function(item) {
										$('#vilage').append(`<option data-id=${item.id}>${item.nama}</option>`);
									});
								});
						});
			}).catch(function() {
					$('#province > option:selected').html('Tidak ada koneksi internet!');
				});
	});

		$('#city').on('change', function(e) {
			var val = $('#city > option:selected').data('id');
			$('#kec').html('');
			getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/${val}/kecamatan`)
				.then(function(data) {
					const kec = data.kecamatans;
					kec.forEach(function(item) {
						$('#kec').append(`<option data-id=${item.id}>${item.nama}</option>`);
					});
				}).then(function() {							
						$('#vilage').html('');
						var idKec = $('#kec > option:selected').data('id');
						console.log(idKec);
						getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/${idKec}/desa`)
							.then(function(data) {
								const kec = data.desas;
								kec.forEach(function(item) {
									$('#vilage').append(`<option data-id=${item.id}>${item.nama}</option>`);
								});
							});;
						}).catch(function() {
							$('#province > option:selected').html('Tidak ada koneksi internet!');
						});
		});

		$('#kec').on('change', function(e) {
			var val = $('#kec > option:selected').data('id');
			$('#vilage').html('');
			getOrigin(`http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/${val}/desa`)
				.then(function(data) {
					const kec = data.desas;
					kec.forEach(function(item) {
						$('#vilage').append(`<option data-id=${item.id}>${item.nama}</option>`);
					});
				}).catch(function() {
					$('#province > option:selected').html('Tidak ada koneksi internet!');
				});
		});

async function getOrigin(url) {
	const response = await fetch(url);
	return await response.json();
}

$('.btn-print').on('click', function(e) {
	e.preventDefault();
	var restorepage = document.body.innerHTML;
	$(document.body).html($('.body-print').html());
	window.print();
	$(document.body).html(restorepage);
});