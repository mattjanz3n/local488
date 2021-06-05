export default function  changeCertificate () {
	$('.certificate__numbers').on('click','button', function(e){
		e.preventDefault();
		$('.certificate__button').removeClass('active');
		$(this).addClass('active');
		let certifecateType = $(this).val();
		$('.certificate-type-number').html(certifecateType);
	});
}
